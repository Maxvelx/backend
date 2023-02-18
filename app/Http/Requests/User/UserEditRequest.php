<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'name'             => 'required|string|max:255',
            'patronymic'       => 'required|string|max:255',
            'lastName'         => 'required|string|max:255',
            'address'          => 'required|max:255',
            'delivery_company' => 'required|max:255',
            'image'            => 'nullable',
            'image.*'          => 'image|max:2048|mimes:mimes:jpeg,png,jpg,gif,svg',
            'phone_number'     => 'required|string|unique:users,phone_number,'.auth()->user()->id,
        ];
    }
}
