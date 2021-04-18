<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IncludedEmailTextInPassword implements Rule
{
    /**
     * @var string
     */
    private $email;

    /**
     * IncludedEmailTextInPassword constructor.
     * @param string $email
     */
    public function __construct(string $email)
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
    public function passes($attribute, $value): bool
    {
        $email_user_name = preg_replace('/@.*$/', '', $this->email);

        if (strpos($value, $email_user_name) !== false) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return trans('validation.custom.password.included_email_text_in_password');
    }
}
