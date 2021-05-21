<?php

namespace App\Http\Requests\Front;

use App\Rules\HalfWidthLowerCase;
use App\Rules\HalfWidthNumber;
use App\Rules\HalfWidthUpperCase;
use App\Rules\InUsersByEmail;
use App\Rules\InUsersByTel;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'sei'       => ['required', 'string', 'max:30', 'regex:/^[\p{Hiragana}|\p{Katakana}|\p{Han}|ー]+$/u'],
            'mei'       => ['required', 'string', 'max:30', 'regex:/^[\p{Hiragana}|\p{Katakana}|\p{Han}|ー]+$/u'],
            'sei_kana'  => ['required', 'string', 'max:50', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'mei_kana'  => ['required', 'string', 'max:50', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'birthday'  => ['required', 'integer', 'digits:8'],
            'tel'       => ['required', 'digits_between:8,11', new InUsersByTel($this->input('tel'))],
            'email'     => ['required', 'email', new InUsersByEmail($this->input('email'))],
            'password'  => [
                'required',
                'string',
                'min:8',
                'max:255',
                new HalfWidthLowerCase(),
                new HalfWidthUpperCase(),
                new HalfWidthNumber(),
            ],
        ];
    }
}
