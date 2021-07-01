<?php

namespace App\Http\Requests\Front;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectDetailRequest extends FormRequest
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
        $projects = Project::all();
        $project_ids = $projects->pluck('id')->toArray();
        return [
            'project_id' => ['integer', Rule::in($project_ids)],
        ];
    }
    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'project_id.integer' => '予期せぬ値が入力されました',
        ];
    }
}
