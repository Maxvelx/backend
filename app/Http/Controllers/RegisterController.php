<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function __invoke( UserRequest $request )
    {
        $data             = $request->validated();
        $data['password'] = \Hash::make( $data['password'] );
        $user             = User::where( 'email', $data['email'] )->first();
        if( $user ) {
            return response( [ 'message' => 'Такий користувач вже зареєстрований' ] );
        }
        $user = User::create( $data );
        $token = auth()->tokenById($user->id);
        return response( ['access_token' => $token] );
    }
}
