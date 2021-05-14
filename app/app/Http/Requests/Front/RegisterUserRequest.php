<?php

namespace App\Http\Requests\Front;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $user_email = hash(config('app.hash_email.algo'), $this->input('email') . config('app.hash_email.salt'));
        $user_tel = hash(config('app.hash_email.algo'), $this->input('tel') . config('app.hash_email.salt'));
        $this->merge(['email_hash' => $user_email]);
        $this->merge(['tel_hash' => $user_tel]);

        return [
            'sei'       => ['required', 'string', 'max:30', 'regex:/^[\p{Hiragana}|\p{Katakana}|\p{Han}|ー]+$/u'],
            'mei'       => ['required', 'string', 'max:30', 'regex:/^[\p{Hiragana}|\p{Katakana}|\p{Han}|ー]+$/u'],
            'sei_kana'  => ['required', 'string', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'mei_kana'  => ['required', 'string', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'birthday'  => ['required', 'integer', 'digits:8'],
            'tel'       => ['required', 'digits_between:8,11', 'unique:users,tel'],
            'tel_hash'  => [Rule::unique('users', 'tel_hash')->whereNull('deleted_at')],
            'email'     => ['required', 'email', "unique:users,email", Rule::unique('users', 'email')->whereNull('deleted_at')],
            'email_hash'=> [Rule::unique('users', 'email_hash')->whereNull('deleted_at')],
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
            'tel.digits_between'=> '無効な電話番号です。',
            'tel.unique'        => 'この電話番号は既に使用されています。',
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
