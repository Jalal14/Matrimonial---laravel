<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationReqRequest extends FormRequest
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
            'fName'     => 'required | alpha',
            'mName'     => 'nullable | alpha',
            'lName'     => 'required | alpha',
            'userName'  => 'bail | required | alpha_num | unique:tbl_registration_req,uname',
            'userName'  => 'unique:tbl_users,uname',
            'dob'       => 'required',
            'email'     => 'bail | required | email | unique:tbl_registration_req,email',
            'email'     => 'unique:tbl_users,email',
            'contact'   => 'required | digits:11',
            'pass'      => 'required',
            'cPass'     => 'same:pass'
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

            'userName.required' => 'User name is required',
            'userName.alpha_num'=> 'User name can contain letters and numbers only',
            'userName.unique'   => 'User name not available',

            'dob.required'      => 'Date of birth is required',

            'email.required'    => 'Email is required',
            'email.unique'      => 'Email is already used',

            'contact.required'  => 'Contact number is required',
            'contact.digits'     => 'Enter 11 digit in contact field',

            'pass.required'     => 'Password is required',
            'cPass.same'        => 'Password does not match with confirm password'
        ];
    }
}
