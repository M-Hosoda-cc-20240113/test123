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
            'sei'       => ['required', 'string', 'max:30', 'regex:/^[\p{Hiragana}|\p{Katakana}|\p{Han}|ー]+$/u'],
            'mei'       => ['required', 'string', 'max:30', 'regex:/^[\p{Hiragana}|\p{Katakana}|\p{Han}|ー]+$/u'],
            'sei_kana'  => ['required', 'string', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'mei_kana'  => ['required', 'string', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'birthday'  => ['required', 'integer', 'digits:8'],
            'tel'       => ['required', 'integer','digits_between:8,11','unique:users'],
            'email'     => ['required', 'email', 'unique:users'],
            'password'  => ['required', 'regex:/^[a-zA-Z0-9]+$/', 'min:8', 'max:30'],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'sei.required'      => '性を入力して下さい。',
            'sei.string'        => '文字列を入力して下さい。',
            'sei.max'           => '30文字以内で入力して下さい。',
            'sei.regex'         => '無効な文字列です。',
            'mei.required'      => '名を入力して下さい。',
            'mei.string'        => '文字列を入力して下さい。。',
            'mei.max'           => '30文字以内で入力して下さい。',
            'mei.regex'         => '無効な文字列です。',
            'sei_kana.required' => 'カナを入力して下さい。',
            'sei_kana.string'   => '文字列を入力して下さい。。',
            'sei_kana.regex'    => 'カタカナで入力して下さい。',
            'mei_kana.required' => 'カナを入力して下さい。',
            'mei_kana.string'   => '文字列を入力して下さい。。',
            'mei_kana.regex'    => 'カタカナで入力して下さい。',
            'birthday.required' => '生年月日を入力して下さい。',
            'birthday.integer'  => '半角数字で入力してください。',
            'birthday.digits'   => '８桁で入力してください。',
            'tel.required'      => '電話番号を入力して下さい。',
            'tel.integer'       => '半角数字で入力してください。',
            'tel.digits_between'=> '無効な電話番号です。',
            'tel.unique'        => '登録済みの電話番号です。',
            'email.required'    => 'メールアドレスを入力して下さい',
            'email.email'       => 'メールアドレスを入力して下さい',
            'email.unique'      => 'このメールアドレスは既に使用されています。',
            'password.required' => 'パスワードを入力して下さい。',
            'password.regex'    => '半角英数字で入力して下さい。',
            'password.min'      => '8桁以上のパスワードを入力して下さい。',
            'password.max'      => '30桁以下のパスワードをご利用下さい。',
        ];
    }


}
