<?php

namespace App\Http\Controllers\Shop\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function __invoke()
    {
        $parts = \Cart::session($_COOKIE['cart_id'])->getContent();
        return view( 'shop.cart.index', compact('parts') );
    }
}
