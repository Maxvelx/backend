<?php

namespace App\Http\Controllers\API\admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'coef' => 'required', 'usd' => 'required', 'euro' => 'required',
        ]);
        \DB::table('settings')->update($data);

        return response(['message'=> 'Данні успішно змінено']);
    }


}
