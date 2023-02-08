<?php

namespace App\Http\Requests\Admin\Parts;

use Illuminate\Foundation\Http\FormRequest;

class ImportPartsRequest extends FormRequest
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
            'file_import'    => 'file|required',
            'price_currency' => 'required|string|max:255',
            'brand_part'     => 'nullable|string|max:255',
            'label'          => 'required|string|max:255',
        ];
    }
}
