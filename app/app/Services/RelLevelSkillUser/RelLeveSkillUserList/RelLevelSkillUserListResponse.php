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
     * @return \App\Models\RelLevelSkillUser[]|\Illuminate\Support\Collection
     */
    public function getRelLevelSkillUser()
    {
        return $this->rel_level_skill_user;
    }

    /**
     * @param \App\Models\RelLevelSkillUser[]|\Illuminate\Support\Collection $rel_level_skill_user
     */
    public function setRelLevelSkillUser($rel_level_skill_user): void
    {
        $this->rel_level_skill_user = $rel_level_skill_user;
    }


}
