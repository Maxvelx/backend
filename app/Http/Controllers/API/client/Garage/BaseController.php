<?php

namespace App\Http\Controllers\API\client\Garage;


use App\Service\Client\GarageAutoService;

class BaseController
{
    public GarageAutoService $service;

    public function __construct(GarageAutoService $service)
    {
        $this->service = $service;
    }
}
