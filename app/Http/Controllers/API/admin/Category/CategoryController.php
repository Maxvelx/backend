<?php

namespace App\Http\Controllers\API\admin\Category;

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
        return Category::select('name','id')->orderBy('id', 'desc')->paginate(10, ['*'], 'page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Admin\Category\StoreCategoryRequest $request
     */

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        Category::firstOrCreate($data);

        return response(status: 201);
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
        $category->update($data);
        return response(status: 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     */

    public function destroy(Category $category)
    {
        $category->delete();

        return response(status: 200);
    }
}
