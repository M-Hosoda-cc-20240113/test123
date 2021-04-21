<?php

namespace App\Http\Requests\Admin\Project;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'                  => ['required','string','max:100'],
            'agent_id'              => ['nullable','integer'],
            'station_id'            => ['nullable','integer'],
            'min_unit_price'        => ['nullable','integer','max:3'],
            'max_unit_price'        => ['required','integer','max:3'],
            'min_operation_time'    => ['nullable','integer','between:2,3'],
            'max_operation_time'    => ['required','integer','between:3,4'],
            'description'           => ['required','string','max:3000'],
            'required_condition'    => ['nullable','string','max:3000'],
            'better_condition'      => ['nullable','string','max:3000'],
            'work_start'            => ['nullable','string','max:6'],
            'work_end'              => ['nullable','string','max:6'],
            'weekly_attendance'     => ['nullable','integer','between:1,5'],
            'feature'               => ['nullable','string','max:3000'],
        ];
    }
    public function  messages(): array
    {
        return [
            'name.required'                 => '案件名は必須です。',
            'name.string'                   => '案件名に文字列以外が入力されました。',
            'name.max'                      => '100文字以上の案件名は登録できません。',
            'agent_id.integer'              => '予期せぬ値が入力されました',
            'station_id.integer'            => '予期せぬ値が入力されました',
            'min_unit_price.integer'        => '半角数字で入力してください。',
            'min_unit_price.max'            => '3桁以上の値は入力できません',
            'max_operation_time.integer'    => '必須項目です。',
            'max_operation_time.integer'    => '半角数字で入力してください。',
            'max_operation_time.max'        => '3桁以上の値は入力できません',
            'description.required'          => '必須項目です。',
            'description.string'            => '予期せぬ値が入力されました。',
            'description.max'               => '3000文字以上は入力できません。',
            'required_condition.string'     => '予期せぬ値が入力されました。',
            'required_condition.max'        => '3000文字以上は入力できません。',
            'better_condition.string'       => '予期せぬ値が入力されました',
            'better_condition.max'          => '3000文字以上は入力できません',
            'work_start.string'             => '時間を入力してください。',
            'work_start.max'                => '時間を入力してください。',
            'work_end.string'               => '時間を入力してください。',
            'work_start.max'                => '時間を入力してください。',
            'weekly_attendance.integer'     => '半角数字で入力してください',
            'weekly_attendance.between'     => '5以上の値は入力できません',
            'feature.string'                => '案件名に文字列以外が入力されました',
            'feature.max'                   => '3000文字以上は入力できません',
        ];
    }
}
