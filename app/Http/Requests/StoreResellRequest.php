<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResellRequest extends FormRequest
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
            'lot' => 'required|numeric|integer',
            'user' => 'required|numeric|integer',
            //'fval' => 'required|numeric|integer',
            //'tcoup' => 'required|numeric|integer',
            'price' => 'required|numeric|integer|min:1000',
        ];
    }
}
