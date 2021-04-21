<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'sei'       => ['required', 'string', 'max:30', 'regex:/^[\p{Hiragana}|\p{Katakana}|\p{Han}|ー]+$/u'],
            'mei'       => ['required', 'string', 'max:30', 'regex:/^[\p{Hiragana}|\p{Katakana}|\p{Han}|ー]+$/u'],
            'sei_kana'  => ['required', 'string', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'mei_kana'  => ['required', 'string', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'birthday'  => ['required', 'integer', 'digits:8'],
            'tel'       => ['required', 'digits_between:8,11', 'unique:users'],
        ];
    }
}
