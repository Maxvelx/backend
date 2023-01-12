<?php

namespace App\Http\Controllers\API\admin\Settings;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return \DB::table('settings')->get();
    }
}
