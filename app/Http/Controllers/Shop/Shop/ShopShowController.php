<?php

namespace App\Http\Controllers\Shop\Shop;

use App\Http\Controllers\Controller;
use App\Models\Parts;
use App\Models\PartsImages;

class ShopShowController extends Controller
{
    public function __invoke(Parts $part)
    {
        return view( 'shop.shop.show', compact('part') );
    }
}
