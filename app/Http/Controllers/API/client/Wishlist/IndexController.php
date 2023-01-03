<?php

namespace App\Http\Controllers\API\client\Wishlist;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\client\PartsResource;

class IndexController extends Controller
{
    public function __invoke()
    {
        if(auth()->user()) {
            $wishlist = auth()->user()->GetLikedParts()->paginate(6);
            return PartsResource::collection($wishlist);
        }
    }
}
