<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateContoller extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate(['coef' => 'required']);
        \DB::table('settings')->update($data);
        return view('admin.settings_shop.index');
    }


}
