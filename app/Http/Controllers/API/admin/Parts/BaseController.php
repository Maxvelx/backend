<?php

namespace App\Http\Controllers\API\admin\Parts;

use App\Service\Admin\PartsAutoService;

class BaseController
{
    public PartsAutoService $service;

    public function __construct(PartsAutoService $service)
{

    $this->service = $service;
}
}
