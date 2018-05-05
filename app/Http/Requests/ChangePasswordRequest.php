<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'required',
            'newPassword' => 'required',
            'cNewPassword' => 'same:newPassword'
        ];
    }
    public function messages()
    {
        return [
            'password.required'    => 'Password field is required',

            'newPassword.required' => 'New password is required',

            'cNewPassword.same'   => 'New password does not match'
        ];
    }
}
