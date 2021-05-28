<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeleteUserRequest extends FormRequest
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
        $users = User::all();
        $user_ids = $users->pluck('id')->toArray();
        return [
            'user_id' => ['required', 'integer', Rule::in($user_ids)],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'user_id.required' => 'ユーザーIDが取得できませんでした。',
        ];
    }
}
