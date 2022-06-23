<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sort', 'desc')->get();
        $data = [];
        foreach ($categories as $category){
            $data[] = $category->articles()
                ->where(function (Builder $builder){
                    return $builder->where('is_active', 1);
                })
                ->get();
        }
        dump($data);

        foreach($data as $item){
            foreach($item as $article){
                dump($article->title, $article->categories->created_at);
            }
        }

//        return view('category.index', [
//            'title' => 'Категории',
//            'data' => $data,
//        ]);
    }
}
