<?php

namespace App\Http\Controllers\API\client\Brands;

use App\Service\Client\ShopShowService;

class BaseController
{
    public ShopShowService $service;

    public function __construct(ShopShowService $service)
    {
        $this->service = $service;
    }
}
