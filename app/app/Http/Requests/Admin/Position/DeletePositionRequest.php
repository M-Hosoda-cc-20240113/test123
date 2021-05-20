<?php

namespace App\Http\Requests\Admin\Position;

use App\Models\Position;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $positions = Position::all();
        $position_id = $positions->pluck('id')->toArray();
        return [
            'position_id' => ['required', Rule::in($position_id)],
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
