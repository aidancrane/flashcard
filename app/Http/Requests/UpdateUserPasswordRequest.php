<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateUserPasswordRequest extends FormRequest
{
    public function messages()
    {
        return [
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
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'password' => 'required|same:password1|min:5|max:191',
          'password1' => 'required_with:password|min:5|max:191'
        ];
    }
}
