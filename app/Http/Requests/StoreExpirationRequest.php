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
            'qty.required' => 'La cantidad es requerida.',
            'expiration.required'  => 'La fecha de vencimiento es requerida.',
            'expiration.date' => 'La fecha de vencimiento es incorrecta.',
            'upc.min' => 'El codigo debe contener 13 caracteres.',
            'upc.max' => 'El codigo debe contener 13 caracteres.',
            'upc.exists' => 'Ese producto no existe.',
        ];
    }
}
