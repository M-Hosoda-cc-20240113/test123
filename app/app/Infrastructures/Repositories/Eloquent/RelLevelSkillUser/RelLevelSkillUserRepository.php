<?php


namespace App\Infrastructures\Repositories\Eloquent\RelLevelSkillUser;


use App\Models\RelLevelSkillUser;
use App\Services\RelLevelSkillUser\RelLevelSkillUserRepositoryInterface;

class RelLevelSkillUserRepository implements RelLevelSkillUserRepositoryInterface
{
    /**
     *
     */
    public function fetchByUserId(int $user_id): \Illuminate\Support\Collection
    {
        return RelLevelSkillUser::join('skills','rel_levels_skills_users.skill_id','=','skills.id')
            ->join('levels','rel_levels_skills_users.level_id','=','levels.id')
            ->where('rel_levels_skills_users.user_id','=',$user_id)
            ->get();
    }
}
