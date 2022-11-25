<?php

namespace App\Http\Controllers\Admin\Parts;

use App\Service\Admin\PartsAutoService;

class BaseController
{
    public PartsAutoService $service;

    public function __construct(PartsAutoService $service)
{

    $this->service = $service;
}
}
