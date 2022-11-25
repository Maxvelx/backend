<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::tree();
        $delimiter  = '';
        return view('admin.category.create', compact('categories', 'delimiter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Admin\Category\StoreCategoryRequest $request
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        if (!empty($data['image_category'])) {
            $data['image_category'] = \Storage::disk('public')->put('/image', $data['image_category']);
        }
        Category::firstOrCreate($data);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     */
    public function edit(Category $category)
    {
        $categories = Category::tree();
        $delimiter  = '';
        return view('admin.category.edit', compact('category', 'delimiter', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Admin\Category\UpdateCategoryRequest $request
     * @param \App\Models\Category $category
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        if (!empty($data['image_category'])) {
            $data['image_category'] = \Storage::disk('public')->put('/image', $data['image_category']);
        }
        $category->update($data);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
