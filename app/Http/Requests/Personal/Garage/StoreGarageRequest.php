<?php

namespace App\Http\Requests\Personal\Garage;

use Illuminate\Foundation\Http\FormRequest;

class StoreGarageRequest extends FormRequest
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
            'power'        => 'nullable|string|max:255',
            'vincode'      => 'required|string|max:20',
            'color'        => 'nullable|string|max:255',
            'model'        => 'required|string|max:255',
            'engine'       => 'required|string|max:255',
            'year'         => 'required|string|max:255',
            'body'         => 'nullable|string|max:255',
            'transmission' => 'nullable|string|max:255',
            'drive'        => 'nullable|string|max:255',
            'packageAuto'  => 'nullable|string|max:255',
            'image'        => 'nullable|sometimes|image|mimes:jpeg,jpg,png,gif,webp|max:5000',
        ];
    }
}
