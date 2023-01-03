<?php

namespace App\Http\Controllers\API\client\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\client\Category\CategoryResource;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return CategoryResource::collection( $categories );
    }
}
