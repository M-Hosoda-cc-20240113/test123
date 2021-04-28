<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class DeleteUserRequest extends FormRequest
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
        return [
            'withdraw-confirm' => ['required', 'string', 'alpha', 'starts_with:confirm', 'ends_with:confirm']
        ];
    }

    public function messages(): array
    {
        return [
            'withdraw-confirm.required' => '内容を確認してください。',
            'withdraw-confirm.string' => '予期せぬ値が入力されました。',
            'withdraw-confirm.alpha' => '予期せぬ値が入力されました。',
            'withdraw-confirm.starts_with' => '予期せぬ値が入力されました。',
            'withdraw-confirm.ends_with' => '予期せぬ値が入力されました。',
        ];
    }
}
