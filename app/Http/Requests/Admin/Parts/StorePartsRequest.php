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
            'brands[]'       => 'array',
            'brands.*'       => 'required|exists:brand_autos,id',
            'tags[]'         => 'array',
            'tags.*'         => 'required|exists:tags,id',
            'brand_part'     => 'string|required',
            'num_part'       => 'string|required',
            'num_oem'        => 'string|required',
            'name_parts'     => 'string|required',
            'quantity'       => 'string|required',
            'price_1'        => 'required',
            'price_2'        => 'nullable',
            'price_currency' => 'integer|required',
            'category_id'    => 'integer|nullable',
            'image[]'        => 'array',
            'image.*'        => 'image',
        ];
    }
}
