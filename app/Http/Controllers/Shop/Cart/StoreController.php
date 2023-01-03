<?php

namespace App\Http\Controllers\Shop\Cart;

use App\Models\Parts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StoreController
{
    public function __invoke( Request $request )
    {

        return response()->json(['data' => $request->id]);
//        $userId = $_COOKIE['cart_id'];
//
//        $price = $part->price_2 ? $part->getPrice($part)['price_2'] : $part->getPrice($part)['price_1'];
//
//        \Cart::session( $userId );
//
//        \Cart::add( [
//            'id'         => $part->id,
//            'name'       => $part->name_parts,
//            'price'      => $price,
//            'quantity'   => 1,
//            'attributes' => [
//                    'number' => $part->num_part,
//            ],
//        ] );
//
//        return redirect()->back();
    }
}
