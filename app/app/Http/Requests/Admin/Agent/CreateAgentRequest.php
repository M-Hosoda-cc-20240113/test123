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
            'name' => ['required','string','max:40'],
        ];
    }

    public function messages(): array
    {
        return [
          'name.required'   => '会社名を入力してください。',
          'name.string'     => '予期せぬ値が入力されました。',
          'name.max40'      => '会社名が長すぎます。',
        ];
    }
}
