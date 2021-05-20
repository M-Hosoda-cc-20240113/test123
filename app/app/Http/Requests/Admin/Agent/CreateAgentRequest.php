<?php

namespace App\Http\Requests\Admin\Agent;

use App\Rules\InAgentsByTel;
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
            'name' => ['required', 'string', 'max:40', 'unique:agents'],
            'tel' => [
                'regex:/^[0-9]{2,4}[0-9]{2,4}[0-9]{3,4}$/',
                'digits_between:8,11',
                new InAgentsByTel($this->input('tel')),
                'nullable'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '会社名を入力してください。',
            'name.string' => '予期せぬ値が入力されました。',
            'name.max40' => '会社名が長すぎます。',
            'name.unique' => 'この会社名はすでに使われています。。',
            'tel.regex' => '正しい番号を入力してください。',
            'tel.digits_between' => '電話番号は8-11桁で入力してください。',
            'tel.unique' => 'この電話番号はすでに使われています。',
        ];
    }
}
