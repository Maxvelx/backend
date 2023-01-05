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
            'name'         => 'required | string',
            'patronymic'   => 'string |required',
            'email'        => 'required | unique:users,email',
            'password'     => 'required | min:8 | max: 256| confirmed',
            'phone_number' => 'string | nullable | unique:users,phone_number',
        ];
    }
}
