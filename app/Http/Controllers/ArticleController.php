<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($id)
    {
        $article = Article::find($id);

        return view('atricle.index', [
            'title' => $article->title,
            'article' => $article,
        ]);
    }
}
