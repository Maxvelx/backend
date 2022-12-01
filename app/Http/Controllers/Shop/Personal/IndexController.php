<?php

namespace App\Http\Controllers\Shop\Personal;

use App\Http\Controllers\Controller;
use App\Models\Parts;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = auth ()->user ();
        $likedParts = auth()->user()->GetLikedParts;
        return view('shop.personal.index', compact ('user', 'likedParts'));
    }
}
