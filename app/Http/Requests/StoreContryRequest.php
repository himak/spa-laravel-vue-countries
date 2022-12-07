<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreContryRequest extends FormRequest
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
            'code' => 'required|string|max:2|unique:countries,code',
            'name' => 'required|string|max:64',
            'full_name' => 'required|string|max:128',
            'iso3' => 'required|string|max:3',
            'number' => 'required|numeric|max:65535',
            'continent_code' => 'required|string|max:2|exists:continents,code',
            'display_order' => 'required|numeric|max:900',
        ];
    }

    public function messages()
    {
        return [
            'number.max' => ':Attribute is too much!'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'continent_code' => Str::upper($this->continent_code),
            'display_order' => (int) $this->display_order
        ]);
    }
}
