<?php

namespace App\Http\Controllers\API\client\Order;

use App\Models\Order;
use Illuminate\Http\Request;

class LabelOrderEditController
{

    public function __invoke(Request $request, Order $order)
    {
        $order->update($request->validate([
            'label' => 'max:30',
        ]));
    }

}