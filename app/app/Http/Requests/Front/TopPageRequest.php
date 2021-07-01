<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class TopPageRequest extends FormRequest
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
            'page' => ['int','nullable'],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            "page.int" => "予期せぬ値が入力されました。"
        ];
    }
}
