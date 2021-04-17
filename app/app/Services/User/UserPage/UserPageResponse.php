<?php


namespace App\Services\User\UserPage;


use App\Models\User;

class UserPageResponse
{
    /**
     * @var User
     */
    private $user;
    private $RelLevelSkillUser;

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

    /**
     * @return mixed
     */
    public function getRelLevelSkillUser()
    {
        return $this->RelLevelSkillUser;
    }

    /**
     * @param mixed $RelLevelSkillUser
     */
    public function setRelLevelSkillUser($RelLevelSkillUser): void
    {
        $this->RelLevelSkillUser = $RelLevelSkillUser;
    }
}
