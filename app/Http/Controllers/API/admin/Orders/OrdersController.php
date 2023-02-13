<?php

namespace App\Http\Controllers\API\admin\Orders;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\admin\Notification\OrderResource;
use App\Http\Resources\API\admin\Orders\OrderSingleResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function index()
    {
        $order = Order::where('viewed', '=', 0)
            ->latest()
            ->paginate(10, ['*'], 'page');

        return OrderResource::collection($order);
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Order $order)
    {
        return new OrderSingleResource($order);
    }



    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'viewed'        => 'nullable|integer|max:2',
            'parts'         => 'nullable',
            'label'         => 'nullable',
            'message_order' => 'max:1000',
        ]);

        if (isset($data['parts'])) {
            $data['parts'] = json_encode($data['parts']);
        }

        $order->update($data);

        return response(status: 200);
    }


    public function destroy(Order $order)
    {
        $order->delete();

        return response(status: 200);
    }
}
