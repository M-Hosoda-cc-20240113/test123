<?php

namespace App\Services\User\ShowEditUserForm;

use App\Models\User;

/**
 * Class ShowEditUserFormResponse
 * @package App\Services\User\ShowEditUserForm
 */
class ShowEditUserFormResponse
{
    /**
     * @var User
     */
    private $user;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return ShowEditUserFormResponse
     */
    public function setUser(User $user): ShowEditUserFormResponse
    {
        $this->user = $user;
        return $this;
    }
}
