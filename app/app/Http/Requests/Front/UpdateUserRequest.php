<?php

namespace App\Http\Requests\Front;

use App\Rules\CanRegisterBirthday;
use App\Rules\InUsersByTel;
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
    public function rules(): array
    {
        return [
            'sei'           => ['required', 'string', 'max:30', 'regex:/^[\p{Hiragana}|\p{Katakana}|\p{Han}|ー]+$/u'],
            'mei'           => ['required', 'string', 'max:30', 'regex:/^[\p{Hiragana}|\p{Katakana}|\p{Han}|ー]+$/u'],
            'sei_kana'      => ['required', 'string', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'mei_kana'      => ['required', 'string', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'birthday'      => ['required', 'date', 'digits:8', new CanRegisterBirthday($this->input('birthday'))],
            'tel'           => ['required', 'digits_between:8,11', new InUsersByTel($this->input('tel'))],
            'contact_time'  => ['contact_time' =>['nullable', 'string', 'max:500']]
        ];
    }
}
