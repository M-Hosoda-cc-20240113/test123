<?php

namespace App\Http\Requests\Admin\Assignment;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAssignmentRequest extends FormRequest
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
            'user_id' => ['integer'],
            'project_id' => ['integer'],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'user_id.integer' => '予期せぬ値が入力されました',
            'project_id.integer' => '予期せぬ値が入力されました',
        ];
    }
}
