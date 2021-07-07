<?php

namespace App\Http\Requests\Admin\Project;

use App\Rules\CanDeleteProject;
use Illuminate\Foundation\Http\FormRequest;

class DeleteProjectRequest extends FormRequest
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
            'project_id' => ['array'],
            'project_id.*' => ['integer', new CanDeleteProject($this->input('project_id'))],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'project_id.*.integer' => '予期せぬ値が入力されました',
        ];
    }
}
