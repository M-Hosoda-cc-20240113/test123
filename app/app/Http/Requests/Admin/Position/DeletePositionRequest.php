<?php

namespace App\Http\Requests\Admin\Position;

use Illuminate\Foundation\Http\FormRequest;

class DeletePositionRequest extends FormRequest
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
            'position_id' => ['required'],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'position_id.required' => 'ポジションが取得できません。',
        ];
    }
}
