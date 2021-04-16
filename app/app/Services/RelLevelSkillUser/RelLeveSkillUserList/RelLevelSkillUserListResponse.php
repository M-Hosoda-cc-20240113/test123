<?php


namespace App\Services\RelLevelSkillUser\RelLeveSkillUserList;


use App\Models\RelLevelSkillUser;
use Illuminate\Support\Collection;

class RelLevelSkillUserListResponse
{
    /**
     * @var RelLevelSkillUser[]|Collection
     */
    private $rel_level_skill_user;

    /**
     * @return RelLevelSkillUser[]|Collection
     */
    public function getLevelSkillUSer()
    {
        return $this->rel_level_skill_user;
    }

    /**
     * @param RelLevelSkillUser[]|Collection $rel_level_skill_user
     * @return RelLevelSkillUserListResponse
     */
    public function setLevelSkillUSer($rel_level_skill_user): RelLevelSkillUserListResponse
    {
        $this->rel_level_skill_user = $rel_level_skill_user;
        return $this;
    }
}
