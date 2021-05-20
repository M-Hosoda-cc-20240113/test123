<?php

namespace App\Http\Requests\Admin\Assignment;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $users = User::all();
        $user_ids = $users->pluck('id')->toArray();

        $projects = Project::all();
        $project_ids = $projects->pluck('id')->toArray();
        return [
            'user_id' => ['integer', Rule::in($user_ids)],
            'project_id' => ['integer', Rule::in($project_ids)],
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
