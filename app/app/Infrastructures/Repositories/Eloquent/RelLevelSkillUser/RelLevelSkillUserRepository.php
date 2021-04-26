<?php


namespace App\Infrastructures\Repositories\Eloquent\RelLevelSkillUser;


use App\Models\RelLevelSkillUser;
use App\Services\RelLevelSkillUser\RelLevelSkillUserRepositoryInterface;
use App\Services\User\EditSkill\UpdateSkillParameter;

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

    /**
     * @param \App\Services\User\EditSkill\UpdateSkillParameter $parameter
     */
    public function update(UpdateSkillParameter $parameter): void
    {
        $user = $parameter->getUser();
        $skill_level = array_combine($parameter->getSkills(), $parameter->getLevels());

        foreach ($skill_level as $skill_id => $level_id) {
            $is_relLevelSkillUser = RelLevelSkillUser::where()->exists();
            if(!$is_relLevelSkillUser){
                $relLevelSkillUser = new RelLevelSkillUser();
                $relLevelSkillUser->user_id = $user->id;
                $relLevelSkillUser->skill_id = $skill_id;
                $relLevelSkillUser->level_id = $level_id;
                $relLevelSkillUser->save();
            }
        }
    }
}
