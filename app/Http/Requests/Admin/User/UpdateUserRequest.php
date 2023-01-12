<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'         => 'required|string',
            'lastName'     => 'string|nullable',
            'patronymic'   => 'string|nullable',
            'email'        => 'email|unique:users,email,' . $this->user->id,
            'phone_number' => 'string|nullable|unique:users,phone_number,' . $this->user->id,
            'address'      => 'string|nullable',
        ];
    }
}
