<?php

namespace App\Services\AdminUser\UserDetail;

use App\Models\User;

class UserDetailResponse
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var
     */
    private $rel_level_skill_user;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return UserDetailResponse
     */
    public function setUser(User $user): UserDetailResponse
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRelLevelSkillUser()
    {
        return $this->rel_level_skill_user;
    }

    /**
     * @param mixed $rel_level_skill_user
     */
    public function setRelLevelSkillUser($rel_level_skill_user): UserDetailResponse
    {
        $this->rel_level_skill_user = $rel_level_skill_user;
        return $this;
    }
}