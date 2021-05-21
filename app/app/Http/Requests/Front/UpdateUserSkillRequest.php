<?php

namespace App\Http\Requests\Front;

use App\Models\Level;
use App\Models\Skill;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserSkillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
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
        $levels = Level::all();
        $level_ids = $levels->pluck('id')->toArray();
        return [
            'skill_ids' => ['array', 'max:10'],
            'level_ids' => ['array', 'max:10'],
            'skill_ids.*' => ['integer', Rule::in($skill_ids)],
            'level_ids.*' => ['integer', Rule::in($level_ids)],
        ];
    }
}
