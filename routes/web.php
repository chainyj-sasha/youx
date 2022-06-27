<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
Route::get('/', [CategoryController::class, 'index'])->name('main_page');

use App\Http\Controllers\ArticleController;
Route::get('/article/{id}', [ArticleController::class, 'index'])->where('id', '\d+')->name('article.index');

use App\Http\Controllers\AdminController;
Route::get('/admin/category_index', [AdminController::class, 'category_index'])->name('category_index');
Route::get('/admin/category_edit/{id}', [AdminController::class, 'category_edit'])->where('id', '\d+')->name('category_edit');
Route::post('/admin/category_update/{id}', [AdminController::class, 'category_update'])->where('id', '\d+')->name('category_update');
Route::post('/admin/category_destroy/{id}', [AdminController::class, 'category_destroy'])->where('id', '\d+')->name('category_destroy');
Route::post('/admin/category_store', [AdminController::class, 'category_store'])->name('category_store');
Route::post('/admin/article_store', [AdminController::class, 'article_store'])->name('article_store');
Route::get('/admin/article_edit/{id}', [AdminController::class, 'article_edit'])->where('id', '\d+')->name('article_edit');
Route::post('/admin/article_update/{id}', [AdminController::class, 'article_update'])->where('id', '\d+')->name('article_update');
