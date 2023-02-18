<?php

namespace App\Http\Controllers\API\client\User;

use App\Models\Garage;
use App\Models\Order;

class IndexPersonalController
{
    public function __invoke()
    {
        $user = auth()->user();

        $wishlist_count = $user->GetLikedParts()->count();
        $order_count    = Order::where('user_id', $user->id)->count();
        $garage_count   = Garage::where('user_id', $user->id)->count();

        return [
            'wish'   => $wishlist_count,
            'order'  => $order_count,
            'garage' => $garage_count,
        ];
    }

}
