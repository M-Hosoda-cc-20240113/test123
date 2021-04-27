<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserSkillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'skill_ids' => ['array','max:10'],
            'level_ids' => ['array','max:10'],
            'skill_ids.*' => ['integer','digits_between:1,3'],
            'level_ids.*' => ['integer','digits_between:1,3'],
        ];
    }
}
