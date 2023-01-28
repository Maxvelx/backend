<?php

namespace App\Http\Controllers\API\client\VinRequest;

use App\Models\VinRequest;
use Illuminate\Http\Request;

class StoreController
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'vin_number'     => 'required|string|max:255',
            'name'           => 'nullable|string|max:255',
            'phone_number'   => 'nullable|string|max:255',
            'email'          => 'nullable|string|max:255',
            'request_parts'  => 'required|string|max:1000',
            'user_id'        => 'nullable|integer|max:255',
        ]);

        VinRequest::firstOrCreate($data);

        return response(status: 200);
    }

}