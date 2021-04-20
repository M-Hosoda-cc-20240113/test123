<?php

namespace App\Services\AdminUser\UserList;

use App\Models\User;
use Illuminate\Support\Collection;

/**
 * Class UserListResponse
 * @package App\Services\User\UserList
 */
class UserListResponse
{
    /**
     * @var User[]|Collection
     */
    private $users;

    /**
     * @return User[]|Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param User[]|Collection $users
     * @return UserListResponse
     */
    public function setUsers($users): UserListResponse
    {
        $this->users = $users;
        return $this;
    }
}
