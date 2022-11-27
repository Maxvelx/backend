<?php

namespace App\Http\Controllers\Shop\Home;

use App\Http\Controllers\Controller;
use App\Models\Parts;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $parts = Parts::all();
        return view('shop.home.index', compact('parts'));
    }

}
