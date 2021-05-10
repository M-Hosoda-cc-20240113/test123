<?php

namespace App\Rules;

use App\Services\User\UserRepositoryInterface;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class SamePasswordAsBefore implements Rule
{
    /**
     * @var string
     */
    private $email_hash;

    /**
     * SamePasswordAsBefore constructor.
     * @param string $email_hash
     */
    public function __construct(string $email_hash)
    {
        $this->email_hash = $email_hash;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $user_repository = resolve(UserRepositoryInterface::class);

        if (Hash::check($value, $user_repository->findByEmailHash($this->email_hash)->password)) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
