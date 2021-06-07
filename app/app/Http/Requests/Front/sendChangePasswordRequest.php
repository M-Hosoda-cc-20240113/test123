<?php

namespace App\Http\Requests\Front;

use App\Models\User;
use App\Rules\InUsersEmail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class sendChangePasswordRequest extends FormRequest
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
        $users = User::all();
        $user_email = $users->pluck('email')->toArray();
        return [
            'email' => ['required', 'email', Rule::in($user_email)],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.in' => '登録済みのメールアドレスを入力してください。'
        ];
    }
}
