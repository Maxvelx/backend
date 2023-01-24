<?php

namespace App\Http\Controllers\API\client\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\client\Order\OrderResource;
use App\Models\Order;

class IndexController extends Controller
{
    public function __invoke()
    {
        $userId = auth()->user()->id;
        $order = Order::where( 'user_id', $userId)->paginate(6);
        return OrderResource::collection( $order );
    }
}
