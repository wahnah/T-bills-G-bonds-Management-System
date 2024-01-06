<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLotRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string', 'min:5', 'max:255'],
            'sec_type' => 'required|numeric|integer',
            'market' => 'required|numeric|integer',
            'price' => 'required|numeric|integer|min:1000',
            'image.*' => 'image'
        ];
    }
}
