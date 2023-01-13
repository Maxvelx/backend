<?php

namespace App\Http\Controllers\API\admin\Settings\Import;

use App\Models\Parts;
use App\Models\Supplier;

class IndexController
{
    public function __invoke()
    {
        $currency  = Parts::getCurrencyStatus();
        $suppliers = Supplier::all();

        return [
            'currency'  => $currency,
            'suppliers' => $suppliers,
        ];
    }
}