<?php

namespace App\Http\Requests\Front;

use App\Models\User;
use App\Rules\CanRegisterBirthday;
use App\Rules\HalfWidthLowerCase;
use App\Rules\HalfWidthNumber;
use App\Rules\HalfWidthUpperCase;
use App\Rules\InUsersByEmail;
use App\Rules\InUsersByTel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
        $users = User::all();
        $user_codes = $users->pluck('invite_code')->toArray();
        return [
            'sei' => ['required', 'string', 'max:30', 'regex:/^[\p{Hiragana}|\p{Katakana}|\p{Han}|ー]+$/u'],
            'mei' => ['required', 'string', 'max:30', 'regex:/^[\p{Hiragana}|\p{Katakana}|\p{Han}|ー]+$/u'],
            'sei_kana' => ['required', 'string', 'max:50', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'mei_kana' => ['required', 'string', 'max:50', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'birthday' => ['required', 'digits:8', 'date', new CanRegisterBirthday($this->input('birthday'))],
            'tel' => ['required', 'digits_between:8,11', new InUsersByTel($this->input('tel'))],
            'email' => ['required', 'email', new InUsersByEmail($this->input('email'))],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:255',
                new HalfWidthLowerCase(),
                new HalfWidthUpperCase(),
                new HalfWidthNumber(),
            ],
            'invite_user_code' => ['nullable', 'string', 'max:30', Rule::in($user_codes)],
            'policy' => ['required'],
            'contact_time' =>['nullable', 'string', 'max:500']
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'invite_user_code.*' => '不正な招待コードです。',
        ];
    }

    protected function prepareForValidation()
    {
        $birthday = str_replace('-', '', $this->input('birthday'));
        $this->merge([
            'birthday' => $birthday,
        ]);
    }
}
