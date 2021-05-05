<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminUserRequest extends FormRequest
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
        return [
            'user_id'               => ['required', 'integer'],
            'operation_start_month' => ['nullable', 'string'],
            'statuses'              => ['nullable', 'array'],
            'statuses.*'            => ['nullable', 'integer'],
            'interview_dates'       => ['nullable', 'array'],
            'interview_dates.*'     => ['nullable', 'string'],
            'assignment_start_date' => ['nullable', 'string'],
            'assignment_end_date'   => ['nullable', 'string'],
            'remarks'               => ['nullable', 'string'],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'user_id.required'              => 'ユーザーIDが取得できませんでした。',
            'user_id.integer'               => 'ユーザーIDに予期せぬ値が入力されました。',
            'statuses.array'                => 'ステータスが取得できませんでした。',
            'interview_dates.array'         => '面談日が取得できませんでした。',
            'assignment_start_date.string'  => '稼働開始日が取得できませんでした。',
            'assignment_end_date.string'    => '稼働終了日が取得できませんでした。',
            'remarks.string'                => '備考欄に予期せぬ値が入力されました。',
        ];
    }
}
