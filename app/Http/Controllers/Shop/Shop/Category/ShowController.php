<?php

namespace App\Http\Controllers\Shop\Shop\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Parts;

class ShowController extends Controller
{
    public function __invoke(Category $category)
    {
        if ($category->parent_id == 0) {
            $childCategories = Category::where('parent_id', '>', 0)->get();
            foreach ($childCategories as $childCategory) {
                if ($childCategory->parent_id == $category->id) {
                    $rootCategories [] = $childCategory;
                }
            }
            return view('shop.shop.category.index', compact('rootCategories'));

        } else {

            $parts = Parts::where('category_id', $category->id)->paginate(20);
            return view('shop.shop.index', compact('parts'));
        }
    }
}
