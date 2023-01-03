<?php

namespace App\Http\Controllers\API\admin\BrandAuto;

use App\Service\Admin\BrandAutoService;

class BaseController
{
    public BrandAutoService $service;

    public function __construct(BrandAutoService $service)
{
    $this->service = $service;
}
}
