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

    /**
     * @var Collection
     */
    private $RelLevelSkillUser;

    /**
     * @var Collection
     */
    private $notes;

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
     * @return UserPageResponse
     */
    public function setRelLevelSkillUser($RelLevelSkillUser): UserPageResponse
    {
        $this->RelLevelSkillUser = $RelLevelSkillUser;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    /**
     * @param Collection $notes
     * @return UserPageResponse
     */
    public function setNotes(Collection $notes): UserPageResponse
    {
        $this->notes = $notes;
        return $this;
    }
}
