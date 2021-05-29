<?php

namespace App\Http\Requests\Front;

use App\Models\Project;
use App\Services\Project\ProjectRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CanApply;
use Illuminate\Validation\Rule;

class CreateApplicationRequest extends FormRequest
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
        $project = Project::all();
        $project_ids = $project->pluck('id')->toArray();
        return [
            'project_id' => ['integer',new CanApply($this->input('project_id'), Rule::in($project_ids))],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'project_id.integer'     => '予期せぬ値が入力されました',
        ];
    }
}
