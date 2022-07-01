<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with(['articles' => function ($query){
            $query->where('is_active', 1)
                    ->orderBy('created_at', 'desc');
        }])->orderBy('sort', 'asc')->get();

        return view('category.index', [
            'title' => 'Основная страница',
            'categories' => $categories,
        ]);
    }
}
