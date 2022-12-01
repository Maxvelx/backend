<?php

namespace App\Http\Controllers\Shop\Personal;

use App\Http\Controllers\Controller;
use App\Models\Parts;

class WishlistController extends Controller
{
    public function destroy($part)
    {
        auth()->user()->GetLikedParts()->detach($part);

        return redirect()->route('personal.index');
    }
}
