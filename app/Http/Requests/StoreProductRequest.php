<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string',
            'upc' => 'required|string|min:13|max:13|unique:products,upc',
            'img' => 'nullable|string',
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
            'name.required' => 'A name is required.',
            'upc.required'  => 'UPC code is required.',
            'upc.unique' => 'A product with that UPC code is already registered.',
            'upc.min' => 'UPC code must be exactly 13 characters',
            'upc.max' => 'UPC code must be exactly 13 characters',
        ];
    }
}
