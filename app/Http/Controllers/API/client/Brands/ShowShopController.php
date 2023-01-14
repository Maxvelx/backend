<?php

namespace App\Http\Controllers\API\client\Brands;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\PartsShopShowRequest;
use App\Http\Resources\API\client\Brands\BrandsResource;
use App\Http\Resources\API\client\Category\CategoryResource;
use App\Http\Resources\API\client\PartsShopResource;
use App\Models\BrandAuto;
use App\Models\Category;
use App\Models\Tag;

class ShowShopController extends Controller
{
    public function __invoke(BrandAuto $brand, PartsShopShowRequest $request)
    {
        $data = $request->validated();

        $parts = BrandAuto::find($brand->id)->parts()
            ->where('is_published', 'true')
            ->paginate(12, ['*'], 'page', $data['page']);

        $categories = Category::all();
        $tags       = Tag::where('model_id', $brand->id)->select('id', 'title', 'label')->get();

        return PartsShopResource::collection($parts)
            ->additional([
                'brand'      => new BrandsResource($brand),
                'categories' => CategoryResource::collection($categories),
                'filters'    => $tags,
            ]);
    }
}


