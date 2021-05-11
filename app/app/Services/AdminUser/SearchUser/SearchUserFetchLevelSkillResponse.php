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
     * @var
     */
    private $searched_skills;

    /**
     * @var
     */
    private $searched_levels;

    /**
     * @var Collection|null
     */
    private $rel_level_skill;

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
     * @return mixed
     */
    public function getSearchedSkills()
    {
        return $this->searched_skills;
    }

    /**
     * @param mixed $searched_skills
     * @return SearchUserFetchLevelSkillResponse
     */
    public function setSearchedSkills($searched_skills): SearchUserFetchLevelSkillResponse
    {
        $this->searched_skills = $searched_skills;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSearchedLevels()
    {
        return $this->searched_levels;
    }

    /**
     * @param mixed $searched_levels
     * @return SearchUserFetchLevelSkillResponse
     */
    public function setSearchedLevels($searched_levels): SearchUserFetchLevelSkillResponse
    {
        $this->searched_levels = $searched_levels;
        return $this;
    }

    /**
     * @return Collection|null
     */
    public function getRelLevelSkill(): ?Collection
    {
        return $this->rel_level_skill;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection|null $rel_level_skill
     * @return SearchUserFetchLevelSkillResponse
     */
    public function setRelLevelSkill(?Collection $rel_level_skill): SearchUserFetchLevelSkillResponse
    {
        $this->rel_level_skill = $rel_level_skill;
        return $this;
    }
}
