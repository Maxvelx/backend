<?php

namespace App\Http\Requests\Admin\Search;

use Illuminate\Foundation\Http\FormRequest;

class SearchUserOrPartsRequest extends FormRequest
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
            'search' => 'string',
            'page' => '',
        ];
    }
}
