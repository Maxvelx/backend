<?php

namespace App\Http\Requests\Admin\BrandAuto;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandAutoRequest extends FormRequest
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
            'brand_auto'  => 'string|max:255',
            'parent_id'   => 'integer',
            'image_brand' => 'nullable',
        ];
    }
}
