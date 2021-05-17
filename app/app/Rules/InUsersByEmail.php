<?php

namespace App\Rules;

use App\Services\User\UserRepositoryInterface;
use Illuminate\Contracts\Validation\Rule;

class InUsersByEmail implements Rule
{
    protected $email;
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
        $user_reposiory = resolve(UserRepositoryInterface::class);

        $user = $user_reposiory->findByEmail($this->email);

        // 存在するときはtrue
        return is_null($user);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'そのメールアドレスはすでに使われています';
    }
}
