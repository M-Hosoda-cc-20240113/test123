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

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required'                 => '案件名は必須です。',
            'name.string'                   => '案件名に文字列以外が入力されました。',
            'name.max'                      => '100文字以上の案件名は登録できません。',
            'agent_id.integer'              => '予期せぬ値が入力されました（案件元会社名）',
            'station_id.required'           => '駅名は必須です。',
            'station_id.integer'            => '予期せぬ値が入力されました（駅名）',
            'min_unit_price.integer'        => '最低単価は半角数字で入力してください。',
            'max_unit_price.required'       => '最高単価は必須です。',
            'max_unit_price.integer'        => '最高単価は整数で入力してください。',
            'min_operation_time.integer'    => '最低生産幅は整数で入力してください',
            'max_operation_time.required'   => '最高生産幅は必須です。',
            'max_operation_time.integer'    => '最高生産幅は半角数字で入力してください。',
            'description.required'          => '案件内容は必須です。',
            'description.string'            => '予期せぬ値が入力されました。（案件内容）',
            'description.max'               => '500文字以上は入力できません。',
            'required_condition.string'     => '予期せぬ値が入力されました。（必須）',
            'required_condition.max'        => '500文字以上は入力できません。（必須）',
            'better_condition.string'       => '予期せぬ値が入力されました。（尚可）',
            'better_condition.max'          => '500文字以上は入力できません。（尚可）',
            'work_start.string'             => '開始時間を入力してください。（就業時間）',
            'work_start.max'                => '正しい開始時間を入力してください。（就業時間）',
            'work_end.string'               => '終了時間を入力してください。（就業時間）',
            'work_end.max'                  => '正しい終了時間を入力してください。（就業時間）',
            'weekly_attendance.integer'     => '出勤回数は半角数字で入力してください',
            'weekly_attendance.between'     => '5以上の値は入力できません（出勤回数）',
            'feature.string'                => '案件特徴に文字列以外が入力されました',
            'feature.max'                   => '500文字以上は入力できません（案件特徴）',
            'skill_ids.required'            => 'スキルは必須です。',
            'skill_ids.*.required'          => 'スキルは必須です。',
        ];
    }
}
