<?php

namespace App\Services\AdminUser\UserDetail;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

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
     * @var Collection
     */
    private $invited_users;

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

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getInvitedUsers(): Collection
    {
        return $this->invited_users;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection $invited_users
     * @return UserDetailResponse
     */
    public function setInvitedUsers(Collection $invited_users): UserDetailResponse
    {
        $this->invited_users = $invited_users;
        return $this;
    }
}
