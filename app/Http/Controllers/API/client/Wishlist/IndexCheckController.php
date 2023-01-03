<?php

namespace App\Http\Controllers\API\client\Wishlist;

use App\Http\Controllers\Controller;

class IndexCheckController extends Controller
{
    public function __invoke()
    {

        $wishlist = [];
        foreach( auth()->user()->GetLikedParts as $getLikedPart ) {
            $wishlist[]['id'] = $getLikedPart->id;
        }
        return $wishlist;

    }
}
