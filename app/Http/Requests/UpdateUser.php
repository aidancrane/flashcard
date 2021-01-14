<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'first_name' => 'required|max:32|alpha',
          'last_name' => 'required|max:32|alpha',
          'friendly_name' => 'required|max:64|alpha_dash',
          'username' => [ 'required', 'max:64', 'alpha_dash' , Rule::unique('users')->ignore($this->user->id) ],
          'email_address' => [ 'required','max:120','email', Rule::unique('users')->ignore($this->user->id) ],
        ];
    }
}
