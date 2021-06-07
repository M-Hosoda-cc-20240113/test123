<?php

namespace App\Rules;

use App\Services\User\UserRepositoryInterface;
use Illuminate\Contracts\Validation\Rule;

class InUsersEmail implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user_repository = resolve(UserRepositoryInterface::class);

        $user = $user_repository->findByEmail($this->email);

        // 存在しない時はfalse
        return !is_null($user);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return '登録済みのメールアドレスをご利用ください。';
    }
}
