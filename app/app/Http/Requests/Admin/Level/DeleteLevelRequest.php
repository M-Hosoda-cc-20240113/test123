<?php

namespace App\Http\Requests\Admin\Level;

use App\Models\Level;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeleteLevelRequest extends FormRequest
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
        $levels = Level::all();
        $level_ids = $levels->pluck('id')->toArray();
        return [
            'level_id' => ['required', Rule::in($level_ids)],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'level_id.required' => 'レベルが取得できません。',
        ];
    }
}
