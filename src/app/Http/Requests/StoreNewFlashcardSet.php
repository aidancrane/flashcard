<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon;

class StoreNewFlashcardSet extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (request()->input('owner_id') == auth()->user()->id) {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'set_title' => 'required|string|max:100',
            'owner_id' => 'required',
            'creation_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $today = Carbon::today()->toDateString();
                    if ($value !== $today) {
                        $fail($attribute . ' must be today.');
                    }
                },
            ],
        ];
    }
}
