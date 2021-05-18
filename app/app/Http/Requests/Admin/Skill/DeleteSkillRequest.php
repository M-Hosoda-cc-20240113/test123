<?php

namespace App\Http\Requests\Admin\Skill;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            'skill_id' => ['required'],
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
