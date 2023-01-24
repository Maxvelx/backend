<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'         => 'required|string|max:256',
            'email'        => 'required|unique:users,email|max:256',
            'password'     => 'required|min:8|max: 256|confirmed',
            'phone_number' => 'required|string|unique:users,phone_number|max:256',
        ];
    }
}
