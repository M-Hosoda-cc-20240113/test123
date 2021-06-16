<?php

namespace App\Http\Requests\Admin\Agent;

use Illuminate\Foundation\Http\FormRequest;

class CreateAgentRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:40', 'unique:agents'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '会社名は必須です。',
            'name.string' => '予期せぬ値が入力されました。',
            'name.max40' => '会社名が長すぎます。',
            'name.unique' => 'この会社名はすでに使われています。',
        ];
    }
}
