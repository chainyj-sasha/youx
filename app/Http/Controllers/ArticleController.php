<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorySearchRequest;
use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show_one($id)
    {
        $article = Article::find($id);
        $article->comments()
            ->orderBy('created_at', 'desc')
            ->get();

        //dd($article, $article->comments);

        return view('article.show', [
            'title' => $article->title,
            'article' => $article,
        ]);
    }

    public function show_search_article(CategorySearchRequest $request)
    {
        $articles = Article::where('title', 'like', "%$request->search%")->get();

        return view('article.show_search_article', [
            'title' => 'Результат поиска',
            'articles' => $articles,
        ]);
    }
}
