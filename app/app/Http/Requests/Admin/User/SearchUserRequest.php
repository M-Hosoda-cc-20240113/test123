<?php

namespace App\Http\Requests\Admin\User;

use App\Models\Level;
use App\Models\Skill;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchUserRequest extends FormRequest
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

        $levels = Level::all();
        $level_ids = $levels->pluck('id')->toArray();
        return [
            'new_user'                   => ['nullable','integer'],
            'not_new_user'               => ['nullable','integer'],
            'is_working'                 => ['nullable','integer'],
            'is_not_working'             => ['nullable','integer'],
            'operation_start_month'      => ['nullable','string'],
            'status'                     => ['nullable','integer', 'between:1,5'],
            'skill_ids'                  => ['array'],
            'skill_ids.*'                => ['nullable','int', Rule::in($skill_ids) ],
            'level_ids'                  => ['array'],
            'level_ids.*'                => ['nullable','int', Rule::in($level_ids) ]
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'new_user.integer'              => '新規:予期せぬ値が入力されました',
            'not_new_user.integer'          => '既存:予期せぬ値が入力されました',
            'is_working.integer'            => '稼働中:予期せぬ値が入力されました',
            'is_not_working.integer'        => '待機中:予期せぬ値が入力されました',
            'operation_start_month.string'  => '営業開始月:予期せぬ値が入力されました',
            'status.required'               => 'ステータス:予期せぬ値が入力されました',
            'status.integer'                => 'ステータス:予期せぬ値が入力されました',
            'status.between'                => 'ステータス:予期せぬ値が入力されました'
        ];
    }
}
