<?php

namespace App\Http\Controllers\API\client\Brands;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\client\Brands\BrandsResource;
use App\Models\BrandAuto;

class IndexController extends Controller
{
    public function __invoke()
    {
        $brands = BrandAuto::where('parent_id', 0)->get();
        return BrandsResource::collection( $brands );
    }
}
