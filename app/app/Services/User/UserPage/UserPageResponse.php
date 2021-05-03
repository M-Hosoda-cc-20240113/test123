<?php


namespace App\Services\User\UserPage;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

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
     * @return Collection
     */
    public function getRelLevelSkillUser(): Collection
    {
        return $this->RelLevelSkillUser;
    }

    /**
     * @param  $RelLevelSkillUser
     */
    public function setRelLevelSkillUser($RelLevelSkillUser): UserPageResponse
    {
        $this->RelLevelSkillUser = $RelLevelSkillUser;
        return $this;
    }
}
