<?php

namespace App\Http\Requests\Front;

use App\Rules\InUsersByEmail;
use Illuminate\Foundation\Http\FormRequest;

class SendChangeEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', new InUsersByEmail($this->input('email'))],
        ];
    }
}
