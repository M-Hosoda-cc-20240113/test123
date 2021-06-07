<?php

namespace App\Http\Requests\Front;

use App\Rules\InUsersEmail;
use Illuminate\Foundation\Http\FormRequest;

class sendChangePasswordRequest extends FormRequest
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
            'email' => ['required', 'email', new InUsersEmail($this->input('email'))],
        ];
    }
}
