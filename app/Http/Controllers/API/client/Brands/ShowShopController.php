<?php

namespace App\Http\Controllers\API\client\Brands;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\PartsShopShowRequest;
use App\Http\Resources\API\client\Brands\BrandsResource;
use App\Http\Resources\API\client\PartsResource;
use App\Models\BrandAuto;

class ShowShopController extends Controller
{
    public function __invoke( BrandAuto $brand, PartsShopShowRequest $request )
    {
        $data  = $request->validated();
        $parts = BrandAuto::find( $brand->id )->parts()->paginate( 12, [ '*' ], 'page', $data['page'] );
        $brand = BrandAuto::where( 'id', $brand->id )->get();
        return PartsResource::collection( $parts )->additional( [ 'brand' => BrandsResource::collection($brand)] );
    }
}


