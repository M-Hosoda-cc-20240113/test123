<?php

namespace App\Rules;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Contracts\Validation\Rule;

class CanRegisterBirthday implements Rule
{
    protected $birthday;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $now = CarbonImmutable::now();
        $year = substr($this->birthday, 0, 4);
        $month = substr($this->birthday, 4, 2);
        $day = substr($this->birthday, 6, 2);
        if ((int)$year > $now->year) {
            return false;
        } elseif ((int)$month > 12) {
            return false;
        } elseif ((int)$day > 31) {
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
        return '正しい生年月日を入力してください';
    }
}
