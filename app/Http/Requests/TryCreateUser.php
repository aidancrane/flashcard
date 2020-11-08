<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TryCreateUser extends FormRequest
{
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
          'tos_accepted.required' => 'You must accept the terms of service and privacy policy to use our site.',
          'password.required' => 'You must put a strong password in to the password box.',
          'password1.required' => 'You must repeat your password.',
          'password.same' => 'The passwords you entered for each box don\'t match.',
      ];
    }

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
          'tos_accepted' => 'bail|required|accepted',
          'first_name' => 'required|max:32|alpha',
          'last_name' => 'required|max:32|alpha',
          'friendly_name' => 'required|max:64|alpha_dash',
          'username' => 'required|max:64|alpha_dash|unique:users',
          'email_address' => 'required|max:120|email|unique:users',
          'password' => 'same:password1|required|min:5|max:191',
          'password1' => 'required|min:5|max:191'
        ];
    }
}
