<?php

namespace App\Http\Requests\Shop\Order;

use Faker\Core\Number;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'email'            => 'required|string|max:255',
            'password'         => 'nullable|string|max:255',
            'lastName'         => 'required|string|max:255',
            'patronymic'       => 'required|string|max:255',
            'phone_number'     => 'required|string|max:255',
            'address'          => 'required|string|max:255',
            'user_id'          => 'nullable',
            'parts'            => 'required|array',
            'payment_status'   => 'nullable',
            'delivery_company' => 'max:20'
        ];
    }
}
