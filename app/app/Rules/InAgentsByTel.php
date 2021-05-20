<?php

namespace App\Rules;

use App\Services\Agent\AgentRepositoryInterface;
use App\Services\User\UserRepositoryInterface;
use Illuminate\Contracts\Validation\Rule;

class InAgentsByTel implements Rule
{
    protected $tel;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($tel)
    {
        $this->tel = $tel;
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
        $agent_repository = resolve(AgentRepositoryInterface::class);

        $agent = $agent_repository->findByTel($this->tel);

        return is_null($agent);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'この電話番号はすでに使われています';
    }
}
