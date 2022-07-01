<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryStoreRequest;
use App\Http\Requests\AdminCategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.category_index', [
            'title' => 'Все категории',
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(AdminCategoryStoreRequest $request)
    {
        if (auth()->check() && auth()->user()->admin){
            Category::create([
                'title' => $request->title,
                'sort' => $request->sort,
            ]);
            return redirect()->route('category.index');
        }
        return abort(404, 'Not found');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.category.category_edit', [
            'title' => 'Редактирование статьи',
            'category' => $category,
        ]);
    }

    public function update(AdminCategoryUpdateRequest $request, Category $category)
    {
        if (auth()->user()->admin){
            $category->title = $request->title;
            $category->sort = $request->sort;
            $category->save();

            return redirect()->route('category.edit', ['category' => $category]);
        }
        return abort(404, 'not found');
    }

    public function destroy(Category $category)
    {
        if (auth()->user()->admin){
            $category->delete();

            return redirect()->route('category.index');
        }
        return abort(404, 'not found');
    }
}
