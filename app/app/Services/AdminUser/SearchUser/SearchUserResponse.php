<?php


namespace App\Services\AdminUser\SearchUser;


use App\Services\AdminUser\UserList\UserListResponse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchUserResponse
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
     * @var int
     */
    private $count_level_skill;

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
     * @param LengthAwarePaginator $users
     * @return SearchUserResponse
     */
    public function setUsers(LengthAwarePaginator $users): SearchUserResponse
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
     * @param \Illuminate\Database\Eloquent\Collection $skills
     * @return SearchUserResponse
     */
    public function setSkills(Collection $skills): SearchUserResponse
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
     * @return SearchUserResponse
     */
    public function setLevels(Collection $levels): SearchUserResponse
    {
        $this->levels = $levels;
        return $this;
    }

    /**
     * @return int
     */
    public function getCountLevelSkill(): int
    {
        return $this->count_level_skill;
    }

    /**
     * @param int $count_level_skill
     * @return SearchUserResponse
     */
    public function setCountLevelSkill(int $count_level_skill): SearchUserResponse
    {
        $this->count_level_skill = $count_level_skill;
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
     * @return SearchUserResponse
     */
    public function setUserCounts(int $user_counts): SearchUserResponse
    {
        $this->user_counts = $user_counts;
        return $this;
    }
}
