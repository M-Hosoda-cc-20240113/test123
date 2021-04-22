<?php

namespace App\Http\Requests\Admin\Station\Admin\Agent\Front;

use App\Rules\HalfWidthLowerCase;
use App\Rules\HalfWidthNumber;
use App\Rules\HalfWidthUpperCase;
use App\Rules\IncludedEmailTextInPassword;
use App\Rules\SamePasswordAsBefore;
use App\Services\User\UserRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            //
            'token' => 'required',
            'token2' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:255',
                'confirmed',
                new HalfWidthLowerCase(),
                new HalfWidthUpperCase(),
                new HalfWidthNumber(),
                new SamePasswordAsBefore($this->input('token2')),
                new IncludedEmailTextInPassword($this->findEmailByEmailHash()),
            ],
            'password_confirmation' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'password.confirmed' => ':attributeと、確認用パスワードが一致していません。',
        ];
    }

    /**
     * @return string
     */
    private function findEmailByEmailHash(): string
    {
        $user_repository = resolve(UserRepositoryInterface::class);

        return $user_repository->findByEmailHash($this->input('token2'))->email;
    }
}
