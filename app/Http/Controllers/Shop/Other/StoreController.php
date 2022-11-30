<?php

namespace App\Http\Controllers\Shop\Other;

use App\Http\Controllers\Controller;
use App\Models\Parts;

class StoreController extends Controller
{
    public function __invoke( Parts $part )
    {
        auth ()->user ()->GetLikedParts ()->toggle ( $part );

        return redirect ()->back ();
    }
}
