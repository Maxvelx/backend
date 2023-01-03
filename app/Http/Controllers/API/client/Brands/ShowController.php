<?php

namespace App\Http\Controllers\API\client\Brands;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\client\Brands\BrandsResource;
use App\Models\BrandAuto;

class ShowController extends Controller
{
    public function __invoke(BrandAuto $brand)
    {
        if ($brand->parent_id == 0) {
            $childBrands = BrandAuto::where('parent_id', '>', 0)->get();
            foreach ($childBrands as $childBrand) {
                if ($childBrand->parent_id === $brand->id) {
                    $brands [] = $childBrand;
                }
            }

            return BrandsResource::collection($brands);
        }
    }
}

