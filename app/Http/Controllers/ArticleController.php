<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorySearchRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show_one($id)
    {
        $article = Article::find($id);

        return view('article.show', [
            'title' => $article->title,
            'article' => $article,
        ]);
    }

    public function show_search_article(CategorySearchRequest $request)
    {
        $articles = Article::where('title', 'like', '%'.$request->search.'%')->get();
        //dd($articles);
        return view('article.show_search_article', [
            'title' => 'Результат поиска',
            'articles' => $articles,
        ]);
    }
}
