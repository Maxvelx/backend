<?php

namespace App\Http\Controllers\API\client\Index\Info;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return \DB::table('site_settings')->first();
    }
}
