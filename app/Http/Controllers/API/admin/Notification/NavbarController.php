<?php

namespace App\Http\Controllers\API\admin\Notification;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\admin\Notification\OrderResource;
use App\Http\Resources\API\admin\Notification\VinRequestResource;
use App\Models\Order;
use App\Models\VinRequest;

class NavbarController extends Controller
{
    private $BiggestTime       = 0;
    private $BiggestTimeForVin = 0;

    public function __invoke()
    {
        $orders = Order::where('viewed', '=', 0)
            ->latest()
            ->limit(5)
            ->get();

        $VinRequest = VinRequest::where('viewed', '=', 0)
            ->latest()
            ->limit(5)
            ->get();


        foreach ($orders as $order) {
            $order->created_at->timestamp > $this->BiggestTime ?
                $this->BiggestTime = $order->created_at->timestamp : false;
        }

        foreach ($VinRequest as $VinRequestSingle) {
            $VinRequestSingle->created_at->timestamp > $this->BiggestTimeForVin ?
                $this->BiggestTimeForVin = $VinRequestSingle->created_at->timestamp : false;
        }

        return [
            'orders'     => OrderResource::collection($orders),
            'vin_request' => VinRequestResource::collection($VinRequest),
            'time'       => $this->BiggestTime,
            'time_vin'   => $this->BiggestTimeForVin,
        ];
    }

}