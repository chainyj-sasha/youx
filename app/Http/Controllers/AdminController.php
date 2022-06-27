<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminArticleStoreRequest;
use App\Http\Requests\AdminArticleUpdateRequest;
use App\Http\Requests\AdminCategoryStoreRequest;
use App\Http\Requests\AdminCategoryUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function category_index()
    {
        $categories = Category::all();

        return view('admin.category_index', [
            'title' => 'Все категории',
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category_create()
    {
        //
    }

    public function category_store(AdminCategoryStoreRequest $request)
    {
        if (auth()->user()->admin){
            Category::create([
                'title' => $request->title,
                'sort' => $request->sort,
            ]);
            return redirect()->route('category_index');
        }
        return abort(404, 'Not found');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category_show($id)
    {
        //
    }


    public function category_edit($id)
    {
        $category = Category::find($id);

        return view('admin.category_edit', [
            'title' => 'Редактирование статьи',
            'category' => $category,
        ]);
    }

    public function category_update(AdminCategoryUpdateRequest $request, $id)
    {

        if (auth()->user()->admin){
            $category = Category::find($id);
            $category->title = $request->title;
            $category->sort = $request->sort;
            $category->save();

            return redirect()->route('category_edit', ['id' => $category->id]);
        }
        return abort(404, 'not found');
    }

    public function category_destroy($id)
    {
        if (auth()->user()->admin){
            $category = Category::find($id);
            $category->delete();

            return redirect()->route('category_index');
        }
        return abort(404, 'not found');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function article_index()
    {
        /**
         * TODO разобраться как вывести все статьи нужной категории.
         */

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function article_create()
    {
        //
    }

    public function article_store(AdminArticleStoreRequest $request)
    {
//        Article::create([
//            'title' => ,
//            'slug' => ,
//            'text' => ,
//            'small_pic' => ,
//            'big_pic' => ,
//        ]);
//        return redirect()->route('category_index');
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function article_show($id)
    {
        //
    }

    public function article_edit($id)
    {
        $article = Article::find($id);
        $categories = Category::select('id', 'title')->get();

        return view('admin.article_edit', [
            'title' => $article->title,
            'article' => $article,
            'categories' => $categories
        ]);
    }

    public function article_update(AdminArticleUpdateRequest $request, $id)
    {
        //dd($request->all());

        $article = Article::find($id);

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

        return redirect()->route('article_edit', ['id' => $article->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function article_destroy($id)
    {
        //
    }
}
