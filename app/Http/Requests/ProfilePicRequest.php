<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePicRequest extends FormRequest
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
            'proPic'    => 'bail|required|image|mimes:jpeg,png',
        ];
    }
    public function messages()
    {
        return [
            'proPic.required'   =>  'You have no selected any image file',
            'proPic.image'      =>  'Select an image file'
        ];
    }
}
