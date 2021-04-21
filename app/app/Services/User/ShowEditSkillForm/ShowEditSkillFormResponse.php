<?php

namespace App\Services\User\ShowEditSkillForm;

use App\Models\Level;
use App\Models\RelLevelSkillUser;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ShowEditSkillFormResponse
 * @package App\Services\User\ShowEditSkillForm
 */
class ShowEditSkillFormResponse
{
    /**
     * @var RelLevelSkillUser[]|Collection
     */
    private $rel_level_skill_users;

    /**
     * @var Skill[]|Collection
     */
    private $skills;

    /**
     * @var Level[]|Collection
     */
    private $levels;

    /**
     * @return RelLevelSkillUser[]|Collection
     */
    public function getRelLevelSkillUsers()
    {
        return $this->rel_level_skill_users;
    }

    /**
     * @param RelLevelSkillUser[]|Collection $rel_level_skill_users
     * @return ShowEditSkillFormResponse
     */
    public function setRelLevelSkillUsers($rel_level_skill_users): ShowEditSkillFormResponse
    {
        $this->rel_level_skill_users = $rel_level_skill_users;
        return $this;
    }

    /**
     * @return Skill[]|Collection
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param Skill[]|Collection $skills
     * @return ShowEditSkillFormResponse
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
        return $this;
    }

    /**
     * @return Level[]|Collection
     */
    public function getLevels()
    {
        return $this->levels;
    }

    /**
     * @param Level[]|Collection $levels
     * @return ShowEditSkillFormResponse
     */
    public function setLevels($levels)
    {
        $this->levels = $levels;
        return $this;
    }
}
