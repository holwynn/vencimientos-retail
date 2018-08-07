<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreExpirationRequest extends FormRequest
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
            'qty' => 'required|integer',
            'expiration' => 'required|date',
            'upc' => 'required|min:13|max:13|exists:products,upc'
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
            'qty.required' => 'You must specify a quantity.',
            'expiration.required'  => 'You must specify an expiration date.',
            'expiration.date' => 'The expiration should be a datetime format.',
            'upc.min' => 'UPC code must be exactly 13 characters',
            'upc.max' => 'UPC code must be exactly 13 characters',
            'upc.exists' => 'UPC code must exist in database.',
        ];
    }

    protected function failedValidation(Validator $validator) 
    {
        throw new HttpResponseException(
            response()->json($validator->errors(), 422)
        );
    }
}
