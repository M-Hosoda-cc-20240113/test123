<?php


namespace App\Services\AdminUser\FetchLevelSkill;

use App\Models\RelLevelSkillUser;
use Illuminate\Database\Eloquent\Collection;

class FetchLevelSkillResponse
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
     * @var Collection|null
     */
    private $rel_level_skill;

    /**
     * @return Collection|null
     */
    public function getSkills(): ?Collection
    {
        return $this->skills;
    }

    /**
     * @param Collection $skills
     * @return FetchLevelSkillResponse
     */
    public function setSkills(Collection $skills): FetchLevelSkillResponse
    {
        $this->skills = $skills;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getLevels(): ?Collection
    {
        return $this->levels;
    }

    /**
     * @param Collection $levels
     * @return FetchLevelSkillResponse
     */
    public function setLevels(Collection $levels): FetchLevelSkillResponse
    {
        $this->levels = $levels;
        return $this;
    }

    /**
     * @return RelLevelSkillUser[]|Collection
     */
    public function getRelLevelSkill()
    {
        return $this->rel_level_skill;
    }

    /**
     * @param RelLevelSkillUser[]|Collection $rel_level_skill
     * @return FetchLevelSkillResponse
     */
    public function setRelLevelSkill($rel_level_skill): FetchLevelSkillResponse
    {
        $this->rel_level_skill = $rel_level_skill;
        return $this;
    }
}
