<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\CommentController;

/* category */
Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category_index');

/* article */
Route::group(['prefix' => 'article'], function (){
    Route::get('/show_search_article', [\App\Http\Controllers\ArticleController::class, 'show_search_article'])->name('show_search_article');
    Route::get('/{id}', [\App\Http\Controllers\ArticleController::class, 'show_one'])->name('article_show_one');
});

/* comment */
Route::post('/comment/', [CommentController::class, 'store']);

/* admin */
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::resource('category', CategoryController::class);
    Route::resource('article', ArticleController::class);
});

Auth::routes();
