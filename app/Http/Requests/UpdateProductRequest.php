<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string',
            'upc' => 'string|min:13|max:13',
            'img' => 'nullable|string',
            'checked' => 'boolean',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.string' => 'A name is required.',
            'upc.string'  => 'UPC code is required.',
            'upc.unique' => 'A product with that UPC code is already registered.',
            'upc.min' => 'UPC code must be exactly 13 characters',
            'upc.max' => 'UPC code must be exactly 13 characters',
            'checked.boolean' => 'Checked value must be boolean'
        ];
    }
}
