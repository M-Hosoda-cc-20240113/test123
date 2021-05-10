<?php


namespace App\Services\AdminUser\SearchUser;


use App\Services\AdminUser\FetchLevelSkill\FetchLevelSkillResponse;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class SearchUserFetchLevelSKillResponse
 * @package App\Services\AdminUser\SearchUser
 */
class SearchUserFetchLevelSkillResponse
{
    /**
     * @var Collection
     */
    private $skills;

    /**
     * @var Collection
     */
    private $levels;

    /**
     * @var int[]|array
     */
    private $searched_skill_ids;

    /**
     * @var int[]|array
     */
    private $searched_level_ids;

    /**
     * @var int|string
     */
    private $searched_new_user;

    /**
     * @var int|string
     */
    private $searched_not_new_user;

    /**
     * @var int|string
     */
    private $searched_is_working;

    /**
     * @var int|string
     */
    private $searched_is_not_working;

    /**
     * @var string
     */
    private $searched_operation_start_month;

    /**
     * @return Collection
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    /**
     * @param Collection $skills
     * @return SearchUserFetchLevelSkillResponse
     */
    public function setSkills(Collection $skills): SearchUserFetchLevelSkillResponse
    {
        $this->skills = $skills;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getLevels(): Collection
    {
        return $this->levels;
    }

    /**
     * @param Collection $levels
     * @return SearchUserFetchLevelSkillResponse
     */
    public function setLevels(Collection $levels): SearchUserFetchLevelSkillResponse
    {
        $this->levels = $levels;
        return $this;
    }

    /**
     * @return array|int[]
     */
    public function getSearchedSkillIds(): array
    {
        return $this->searched_skill_ids;
    }

    /**
     * @param array|int[] $searched_skill_ids
     * @return SearchUserFetchLevelSkillResponse
     */
    public function setSearchedSkillIds(array $searched_skill_ids): SearchUserFetchLevelSkillResponse
    {
        $this->searched_skill_ids = $searched_skill_ids;
        return $this;
    }

    /**
     * @return array|int[]
     */
    public function getSearchedLevelIds(): array
    {
        return $this->searched_level_ids;
    }

    /**
     * @param array|int[] $searched_level_ids
     * @return SearchUserFetchLevelSkillResponse
     */
    public function setSearchedLevelIds(array $searched_level_ids): SearchUserFetchLevelSkillResponse
    {
        $this->searched_level_ids = $searched_level_ids;
        return $this;
    }

    /**
     * @return int|string
     */
    public function getSearchedNewUser()
    {
        return $this->searched_new_user;
    }

    /**
     * @param int|string $searched_new_user
     * @return SearchUserFetchLevelSkillResponse
     */
    public function setSearchedNewUser($searched_new_user): SearchUserFetchLevelSkillResponse
    {
        $this->searched_new_user = $searched_new_user;
        return $this;
    }

    /**
     * @return int|string
     */
    public function getSearchedNotNewUser()
    {
        return $this->searched_not_new_user;
    }

    /**
     * @param int|string $searched_not_new_user
     * @return SearchUserFetchLevelSkillResponse
     */
    public function setSearchedNotNewUser($searched_not_new_user): SearchUserFetchLevelSkillResponse
    {
        $this->searched_not_new_user = $searched_not_new_user;
        return $this;
    }

    /**
     * @return int|string
     */
    public function getSearchedIsWorking()
    {
        return $this->searched_is_working;
    }

    /**
     * @param int|string $searched_is_working
     * @return SearchUserFetchLevelSkillResponse
     */
    public function setSearchedIsWorking($searched_is_working): SearchUserFetchLevelSkillResponse
    {
        $this->searched_is_working = $searched_is_working;
        return $this;
    }

    /**
     * @return int|string
     */
    public function getSearchedIsNotWorking()
    {
        return $this->searched_is_not_working;
    }

    /**
     * @param int|string $searched_is_not_working
     * @return SearchUserFetchLevelSkillResponse
     */
    public function setSearchedIsNotWorking($searched_is_not_working): SearchUserFetchLevelSkillResponse
    {
        $this->searched_is_not_working = $searched_is_not_working;
        return $this;
    }

    /**
     * @return string
     */
    public function getSearchedOperationStartMonth(): string
    {
        return $this->searched_operation_start_month;
    }

    /**
     * @param string $searched_operation_start_month
     * @return SearchUserFetchLevelSkillResponse
     */
    public function setSearchedOperationStartMonth(string $searched_operation_start_month): SearchUserFetchLevelSkillResponse
    {
        $this->searched_operation_start_month = $searched_operation_start_month;
        return $this;
    }
}
