<?php

namespace App\Http\Controllers\Shop\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __invoke()
    {
        return view('shop.other.about');
    }
}
