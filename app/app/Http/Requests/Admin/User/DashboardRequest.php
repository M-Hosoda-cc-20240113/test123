<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class DashboardRequest extends FormRequest
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
            'status' => ['required', 'integer', 'between:1,5'],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'status.required' => 'ステータス:予期せぬ値が入力されました',
            'status.integer'  => 'ステータス:予期せぬ値が入力されました',
            'status.between'  => 'ステータス:予期せぬ値が入力されました',
        ];
    }
}
