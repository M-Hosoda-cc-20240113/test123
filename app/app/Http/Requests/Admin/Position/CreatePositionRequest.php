<?php

namespace App\Http\Requests\Admin\Position;

use Illuminate\Foundation\Http\FormRequest;

class CreatePositionRequest extends FormRequest
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
            'name' => ['required', 'unique:positions,name', 'string', 'max:100'],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required'        => 'ポジション名を入力してください。',
            'name.unique'          => 'このポジションはすでに存在しています。',
            'name.string'          => '正しく入力してください。',
            'name.max'             => 'ポジション名が長すぎます。',
        ];
    }
}
