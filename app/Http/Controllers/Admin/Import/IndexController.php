<?php

namespace App\Http\Controllers\Admin\Import;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view ( 'admin.import.index' );
    }
}
