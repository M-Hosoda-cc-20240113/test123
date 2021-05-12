<?php

namespace App\Services\AdminUser\UserList;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class UserListResponse
 * @package App\Services\User\UserList
 */
class UserListResponse
{
    /**
     * @var LengthAwarePaginator
     */
    private $users;

    /**
     * @return LengthAwarePaginator
     */
    public function getUsers(): LengthAwarePaginator
    {
        return $this->users;
    }

    /**
     * @param \Illuminate\Pagination\LengthAwarePaginator $users
     * @return UserListResponse
     */
    public function setUsers(LengthAwarePaginator $users): UserListResponse
    {
        $this->users = $users;
        return $this;
    }
}
