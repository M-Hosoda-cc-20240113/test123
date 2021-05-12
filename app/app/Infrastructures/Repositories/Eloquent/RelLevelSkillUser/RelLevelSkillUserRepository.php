<?php


namespace App\Infrastructures\Repositories\Eloquent\RelLevelSkillUser;


use App\Models\Level;
use App\Models\RelLevelSkillUser;
use App\Models\Skill;
use App\Services\RelLevelSkillUser\RelLevelSkillUserRepositoryInterface;
use App\Services\User\EditSkill\UpdateSkillParameter;
use Illuminate\Database\Eloquent\Collection;

class RelLevelSkillUserRepository implements RelLevelSkillUserRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function fetchByUserId(int $user_id): \Illuminate\Support\Collection
    {
        return RelLevelSkillUser::join('skills', 'rel_levels_skills_users.skill_id', '=', 'skills.id')
            ->join('levels', 'rel_levels_skills_users.level_id', '=', 'levels.id')
            ->where('rel_levels_skills_users.user_id', '=', $user_id)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function create(UpdateSkillParameter $parameter): void
    {
        $user_id = $parameter->getUserId();
        $skill_level = array_combine($parameter->getSkillids(), $parameter->getLevelids());

        foreach ($skill_level as $skill_id => $level_id) {
            $rel_level_skill_user = new RelLevelSkillUser();
            $rel_level_skill_user->user_id = $user_id;
            $rel_level_skill_user->skill_id = $skill_id;
            $rel_level_skill_user->level_id = $level_id;
            $rel_level_skill_user->save();
        }
    }

    /**
     * {@inheritDoc}
     */
    public function deleteByUserId($user_id): void
    {
        RelLevelSkillUser::where('user_id', $user_id)->delete();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByLevelIdAndSkillId(array $level_ids, array $skill_ids): array
    {
        return array_combine($skill_ids,$level_ids);
    }
}
