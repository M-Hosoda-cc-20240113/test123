<?php

namespace App\Http\Requests\Admin\Project;

use App\Models\Area;
use App\Models\Position;
use App\Models\Skill;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchProjectRequest extends FormRequest
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
        $skills = Skill::all();
        $skill_ids = $skills->pluck('id')->toArray();

        $positions = Position::all();
        $position_ids = $positions->pluck('id')->toArray();

        $areas = Area::all();
        $area_ids = $areas->pluck('id')->toArray();
        return [
            'keyword' => ['nullable', 'string', 'max:100'],
            'skill_ids' => ['array'],
            'skill_ids.*' => ['nullable','int', Rule::in($skill_ids)],
            'position_ids' => ['array'],
            'position_ids.*' => ['nullable','int', Rule::in($position_ids)],
            'area_ids' => ['array'],
            'area_ids.*' => ['nullable','int', Rule::in($area_ids)],
        ];
    }
}
