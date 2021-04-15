<?php


namespace App\Services\User\UserPage;


use App\Models\User;

class UserPageResponse
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
     * @return UserPageResponse
     */
    public function setUser(User $user): UserPageResponse
    {
        $this->user = $user;
        return $this;
    }
}
