<?php

namespace App\Http\Requests\Admin\Parts;

use Illuminate\Foundation\Http\FormRequest;

class StorePartsRequest extends FormRequest
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
            'brands[]'    => 'array|nullable',
            'brands.*'    => 'nullable|exists:brand_autos,id',
            'brand_part'  => 'string|nullable',
            'num_part'    => 'string|nullable',
            'num_oem'     => 'string|nullable',
            'name_parts'  => 'string|nullable',
            'quantity'    => 'integer|nullable',
            'price_1'     => 'integer|nullable',
            'price_2'     => 'integer|nullable',
            'category_id' => 'integer',
        ];
    }
}
