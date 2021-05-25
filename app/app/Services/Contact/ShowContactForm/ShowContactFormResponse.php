<?php

namespace App\Services\Contact\ShowContactForm;

use App\Models\User;

/**
 * Class ShowContactFormResponse
 * @package App\Services\Contact\ShowContactForm
 */
class ShowContactFormResponse
{
    /**
     * @var User|null
     */
    private $user;

    /**
     * @return \App\Models\User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param \App\Models\User|null $user
     * @return ShowContactFormResponse
     */
    public function setUser(?User $user): ShowContactFormResponse
    {
        $this->user = $user;
        return $this;
    }
}
