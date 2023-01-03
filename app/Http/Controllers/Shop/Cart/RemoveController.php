<?php

namespace App\Http\Controllers\Shop\Cart;

use App\Models\Parts;

class RemoveController
{
public function __invoke(Parts $part)
{
    \Cart::session($_COOKIE['cart_id'])->remove($part->id);

    return redirect()->route( 'cart.index' );
}
}
