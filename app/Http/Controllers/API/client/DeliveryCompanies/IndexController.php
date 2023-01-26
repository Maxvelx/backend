<?php

namespace App\Http\Controllers\API\client\DeliveryCompanies;

use App\Http\Controllers\Controller;
use App\Models\DeliveryCompany;

class IndexController extends Controller
{
    public function __invoke()
    {
        return DeliveryCompany::where('is_active', 1)
            ->select('title','id')
            ->get();
    }
}
