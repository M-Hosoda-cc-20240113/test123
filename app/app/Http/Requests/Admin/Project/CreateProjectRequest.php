<?php

namespace App\Http\Requests\Front\Admin\Project;

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
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'min_unit_price' => 'nullbale|integer|max:8',
            'max_unit_price' => 'required|integer|max:8',
            'min_operation_time' => 'integer|max:4',
            'max_operation_time' => 'required|integer|max:4',
            'description' => 'required|string|max:1000',
            'required_condition' => 'string|max:1000',
            'better_condition' => 'string|max:1000',
            'work_start' => 'string|max:10',
            'work_end' => 'string|max:10',
            'weekly_attendance' => 'integer|between:1,5',
            'feature' => 'string|max:3000',
        ];
    }
}
