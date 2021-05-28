<?php

namespace App\Http\Requests\Admin\Level;

use Illuminate\Foundation\Http\FormRequest;

class CreateLevelRequest extends FormRequest
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
            'level' => ['required', 'unique:levels,level', 'string', 'max:20'],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'level.required'        => 'レベル名を入力してください。',
            'level.unique'          => 'このレベルはすでに存在しています。',
            'level.string'          => '正しく入力してください。',
            'level.max'             => 'レベル名が長すぎます。',
        ];
    }
}
