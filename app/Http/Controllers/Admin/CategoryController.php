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
        Category::create([
            'title' => $request->title,
            'sort' => $request->sort,
        ]);
        return redirect()->route('category.index');
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
        $category->title = $request->title;
        $category->sort = $request->sort;
        $category->save();

        return redirect()->route('category.edit', ['category' => $category]);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index');
    }
}
