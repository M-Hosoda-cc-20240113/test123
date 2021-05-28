<?php

namespace App\Http\Requests\Admin\Skill;

use Illuminate\Foundation\Http\FormRequest;

class CreateSkillRequest extends FormRequest
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
            'name' => ['required', 'unique:skills,name', 'string', 'max:20'],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required'        => 'スキル名を入力してください。',
            'name.unique'          => 'このスキルはすでに存在しています。',
            'name.string'          => '正しく入力してください。',
            'name.max'             => 'スキル名が長すぎます。',
        ];
    }
}
