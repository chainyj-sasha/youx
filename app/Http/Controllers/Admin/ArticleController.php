<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminArticleStoreRequest;
use App\Http\Requests\AdminArticleUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'title')->get();
        $articles = Article::all();

        return view('admin.article.article_index', [
            'title' => 'все статьи',
            'categories' => $categories,
            'articles' => $articles,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(AdminArticleStoreRequest $request)
    {
        if (auth()->check() && auth()->user()->admin){
            if ($request->has('big_pic')){
                $image = $request->file('big_pic')->store('images', 'public');
            }
            if ($request->has('editor')){
                $text = $request->input('editor');
            }
            $article = Article::create([
                'title' => $request->input('title'),
                'text' => $text ?? null,
                'small_pic' => $request->file('small_pic')->store('images', 'public'),
                'big_pic' => $image ?? null,
                'is_active' => $request->input('is_active'),
            ]);

            $count = count($request->category);
            for ($i = 0; $i < $count; $i++){
                $article->categories()->attach($request->category[$i]);
            }
        }
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    public function edit(Article $article)
    {
        return view('admin.article.article_edit', [
            'title' => 'Редактирование статьи',
            'article' => $article,
        ]);
    }

    public function update(AdminArticleUpdateRequest $request, Article $article)
    {
        if (auth()->check() && auth()->user()->admin){
            $article->title = $request->input('title');
            $article->text = $request->input('editor');
            if ($request->hasFile('small_pic')) {
                $article->small_pic = $request->file('small_pic')->store('images', 'public');
            }
            if ($request->hasFile('big_pic')) {
                $article->big_pic = $request->file('big_pic')->store('images', 'public');
            }
            $article->is_active = $request->input('is_active');

            $article->save();

            return redirect()->route('article.edit', ['article' => $article]);
        }

    }

    public function destroy(Article $article)
    {
        if (auth()->check() && auth()->user()->admin){
            $article->delete();
            $article->categories()->detach();

            return redirect()->route('article.index');
        }
    }
}
