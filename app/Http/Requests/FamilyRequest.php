<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyRequest extends FormRequest
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
            'family_type' => 'required',
            'faName' => 'required',
            'moName' => 'required',
            'siblings' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'family_type.required'    => 'Select a family type',

            'faName.required' => 'Father name is required',

            'moName.required' => 'Mother name is required'
        ];
    }
}
