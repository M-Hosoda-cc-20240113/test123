<?php

namespace App\Http\Requests\Front;

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
            'sei'       => ['required', 'string', 'max:255'],
            'mei'       => ['required', 'string', 'max:255'],
            'sei_kana'  => ['required', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u', 'max:255'],
            'mei_kana'  => ['required', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u', 'max:255'],
            'birthday'  => ['required', 'string', 'max:255'],
            'tel'       => ['required', 'regex:/^[a-zA-Z0-9]+$/u', 'max:14'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed','alpha_dash'],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'sei.required'      => '性は必ず入力して下さい。',
            'mei.required'      => '名は必ず入力して下さい。',
            'sei_kana.required' => 'カナは必ず入力して下さい。',
            'mei_kana.required' => 'カナは必ず入力して下さい。',
            'birthday.required' => '生年月日は必ず入力して下さい、また半角数字でお願いします。',
            'tel.required'      => '電話番号は必ず入力して下さい。',
            'password.required' => 'パスワードは必ず入力して下さい。',
            'email.required'    => 'メールアドレスが正しいか確認して入力して下さい',
        ];
    }


}
