<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexContoller extends Controller
{
    public function __invoke()
    {
        return view('admin.settings_shop.index');
    }
}
