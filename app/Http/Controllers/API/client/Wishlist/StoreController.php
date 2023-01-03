<?php

namespace App\Http\Controllers\API\client\Wishlist;

use App\Http\Controllers\Controller;
use App\Models\Parts;

class StoreController extends Controller
{
    public function __invoke( Parts $part )
    {
        $wishlist = [];
        auth()->user()->GetLikedParts()->toggle( $part );
        foreach( auth()->user()->GetLikedParts as $getLikedPart ) {
            $wishlist[]['id'] = $getLikedPart->id;
        }
        return $wishlist;
    }
}
