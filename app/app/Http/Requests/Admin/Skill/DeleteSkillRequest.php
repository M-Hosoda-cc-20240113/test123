<?php

namespace App\Http\Requests\Admin\Skill;

use App\Models\Skill;
use App\Models\Station;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeleteSkillRequest extends FormRequest
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
        $skills = Skill::all();
        $skill_ids = $skills->pluck('id')->toArray();
        return [
            'skill_id' => ['required', Rule::in($skill_ids)],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'skill_id.required' => 'スキルが取得できません。',
        ];
    }
}
