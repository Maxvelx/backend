<?php

namespace App\Http\Controllers\API\admin\Orders;

use App\Http\Resources\API\admin\Notification\OrderResource;
use App\Models\Order;

class IndexController
{
    public function __invoke()
    {
        $orders = Order::latest()->paginate(15, ['*'], 'page');

        return OrderResource::collection($orders);
    }
}