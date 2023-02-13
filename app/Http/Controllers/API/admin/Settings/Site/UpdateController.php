<?php

namespace App\Http\Controllers\API\admin\Settings\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'phone'         => 'required|string|max:255',
            'address'       => 'required|string|max:255',
            'city'          => 'required|string|max:255',
            'state'         => 'required|string|max:255',
            'email'         => 'required|string|max:255',
            'work_hour'     => 'required|string|max:255',
            'telegram'      => 'required|string|max:255',
            'viber'         => 'required|string|max:255',
            'facebook'      => 'required|string|max:255',
            'instagram'     => 'required|string|max:255',
            'google_maps'   => 'required|string|max:2000',
            'about_us_text' => 'required|string|max:2000',
        ]);
        \DB::table('site_settings')->update($data);

        return response(['message' => 'Данні успішно змінено']);
    }
}
