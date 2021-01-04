<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Set;
use Illuminate\Support\Facades\Gate;
use Auth;

class UpdateSet extends FormRequest
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
          'set_title' => 'bail|max:200|min:5',
          'set_description' => 'bail|max:200|min:5|nullable',
          'category' => 'max:100',
              ];
    }
}
