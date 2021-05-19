<?php

namespace App\Services\AdminUser\UserList;

use Illuminate\Support\Collection;
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
     * @var Collection
     */
    private $skills;

    /**
     * @var Collection
     */
    private $levels;

    /**
     * @var Collection|array
     */
    private $rel_level_skill;

    /**
     * @var int
     */
    private $user_counts;

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

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    /**
     * @param Collection $skills
     * @return UserListResponse
     */
    public function setSkills(Collection $skills): UserListResponse
    {
        $this->skills = $skills;
        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLevels(): Collection
    {
        return $this->levels;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection $levels
     * @return UserListResponse
     */
    public function setLevels(Collection $levels): UserListResponse
    {
        $this->levels = $levels;
        return $this;
    }

    /**
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function getRelLevelSkill()
    {
        return $this->rel_level_skill;
    }

    /**
     * @param array|\Illuminate\Database\Eloquent\Collection $rel_level_skill
     * @return UserListResponse
     */
    public function setRelLevelSkill($rel_level_skill)
    {
        $this->rel_level_skill = $rel_level_skill;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserCounts(): int
    {
        return $this->user_counts;
    }

    /**
     * @param int $user_counts
     * @return UserListResponse
     */
    public function setUserCounts(int $user_counts): UserListResponse
    {
        $this->user_counts = $user_counts;
        return $this;
    }
}
