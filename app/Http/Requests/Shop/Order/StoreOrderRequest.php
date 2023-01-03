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
            'name'           => '',
            'email'          => '',
            'password'       => '',
            'lastName'       => '',
            'patronymic'     => '',
            'phone_number'   => '',
            'address'        => '',
            'user_id'        => 'nullable',
            'parts'          => 'required|array',
            'total_price'    => 'required',
            'payment_status' => 'nullable',
        ];
    }
}
