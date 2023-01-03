<?php

namespace App\Http\Controllers\Shop\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Order\StoreOrderRequest;
use App\Http\Requests\Shop\Order\UpdateOrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Shop\Order\StoreOrderRequest  $request
     */
    public function store(StoreOrderRequest $request)
    {
//        dd( $request->validated() );
        $data = $request->validated();
        foreach( $data as $item ) {
            dump( $item );
        }
        dd();
        Order::firstOrCreate($request->validated() );
//        \Cookie::forget( 'cart_id' );
        return redirect()->route( 'shop.home.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Shop\Order\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     */
    public function destroy(Order $order)
    {
        //
    }
}
