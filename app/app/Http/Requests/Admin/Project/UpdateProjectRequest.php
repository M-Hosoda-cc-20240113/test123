<?php

namespace App\Http\Requests\Admin\Project;

use App\Models\Agent;
use App\Models\Position;
use App\Models\Skill;
use App\Models\Station;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
        $skills = Skill::all();
        $skill_ids = $skills->pluck('id')->toArray();
        $positions = Position::all();
        $position_id = $positions->pluck('id')->toArray();

        $agents = Agent::all();
        $agent_ids = $agents->pluck('id')->toArray();
        $stations = Station::all();
        $station_ids = $stations->pluck('id')->toArray();
        return [
            'name'                  => ['required', 'string', 'max:50'],
            'agent_id'              => ['nullable', 'integer', Rule::in($agent_ids)],
            'station_id'            => ['required', 'integer', Rule::in($station_ids)],
            'min_unit_price'        => ['nullable', 'integer'],
            'max_unit_price'        => ['required', 'integer'],
            'min_operation_time'    => ['nullable', 'integer'],
            'max_operation_time'    => ['required', 'integer'],
            'description'           => ['required', 'string', 'max:500'],
            'required_condition'    => ['nullable', 'string', 'max:500'],
            'better_condition'      => ['nullable', 'string', 'max:500'],
            'work_start'            => ['nullable', 'string', 'max:5'],
            'work_end'              => ['nullable', 'string', 'max:5'],
            'weekly_attendance'     => ['nullable', 'integer', 'between:1,5'],
            'feature'               => ['nullable', 'string', 'max:500'],
            'skill_ids'             => ['required', 'array', 'max:10'],
            'position_ids'          => ['array', 'max:10'],
            'skill_ids.*'           => ['required', 'integer', Rule::in($skill_ids)],
            'position_ids.*'        => ['nullable', 'integer', Rule::in($position_id)],
        ];
    }
}
