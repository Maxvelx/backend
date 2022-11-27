<?php

namespace App\Http\Controllers\Shop\Personal;

use App\Http\Controllers\Controller;
use App\Models\Parts;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('shop.personal.index');
    }
}
