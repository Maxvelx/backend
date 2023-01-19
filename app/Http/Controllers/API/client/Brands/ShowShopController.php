<?php

namespace App\Http\Controllers\API\client\Brands;

use App\Http\Requests\Shop\PartsShopShowRequest;
use App\Models\BrandAuto;

class ShowShopController extends BaseController
{
    public function __invoke(BrandAuto $brand, PartsShopShowRequest $request)
    {
        $data = $request->validated();

        return $this->service->filter($brand, $data);
    }
}


