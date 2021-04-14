<?php

namespace App\Services\User\UserList;

use App\Models\User;
use Illuminate\Support\Collection;

/**
 * Class UserListResponse
 * @package App\Services\User\UserList
 */
class UserListResponse
{
    /**
     * @var
     */
    private $user;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return UserListResponse
     */
    public function setUser($user): UserListResponse
    {
        $this->user = $user;
        return $this;
    }
}
