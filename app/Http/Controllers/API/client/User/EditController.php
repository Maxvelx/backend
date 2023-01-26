<?php

namespace App\Http\Controllers\API\client\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'name'             => 'required|string|max:255',
            'patronymic'       => 'required|string|max:255',
            'lastName'         => 'required|string|max:255',
            'address'          => 'required|max:255',
            'delivery_company' => 'required|max:255',
            'phone_number'     => 'required|string|unique:users,phone_number,'.auth()->user()->id,
        ]);
        auth()->user()->update($data);

        return response(['message' => 'Ви успішно оновили профіль']);
    }
}
