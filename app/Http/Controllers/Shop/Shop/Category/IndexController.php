<?php

namespace App\Http\Controllers\Shop\Shop\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {
        $rootCategories = Category::where('parent_id', 0)->get();
        return view('shop.shop.category.index', compact('rootCategories'));
    }
}
