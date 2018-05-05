<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
        $time = strtotime("-18 year", time());
        $date = date("Y-m-d", $time);
        return [
            'fName'     => 'required | alpha',
            'mName'     => 'nullable | alpha',
            'lName'     => 'required | alpha',
            'dob'       => 'required',
            'height'    => 'nullable | numeric',
            'weight'    => 'nullable | numeric',
            'email'     => 'required | email',
            'contact'   => 'required | digits:11',
            'contact2'  => 'nullable | digits:11',
            'children'  => 'digits_between:0,10'
        ];
    }

    public function messages()
    {
        return [
            'fName.required'    => 'First name is required',
            'fName.alpha'       => 'First name can contain only letters',

            'mName.alpha'       => 'Middle name can contain only letters',

            'lName.required'    => 'Last name is required',
            'lName.alpha'       => 'Last name can contain only letters',

            'dob.required'      => 'Date of birth is required',

            'email.required'    => 'Email is required',
            'email.required'    => 'Email is required',

            'contact.required'  => 'Number1 number is required',
            'contact.digits'    => 'Enter 11 digit in number1 field',

            'contact2.digits'    => 'Enter 11 digit in number2 field',

            'children.required' => 'Number of children is required',
            'children.digits_between' => 'Enter number of children'
        ];
    }
}
