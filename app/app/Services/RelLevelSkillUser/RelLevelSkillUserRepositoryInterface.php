<?php


namespace App\Services\RelLevelSkillUser;


use App\Services\User\EditSkill\UpdateSkillParameter;
use Illuminate\Database\Eloquent\Collection;

interface RelLevelSkillUserRepositoryInterface
{
    /**
     * @param int $user_id
     * @return Collection
     */
    public function fetchByUserId(int $user_id): Collection;


    /**
     * @param \App\Services\User\EditSkill\UpdateSkillParameter $parameter
     * @return void
     */
    public function create(UpdateSkillParameter $parameter): void;

    /**
     * @param $user_id
     */
    public function deleteByUserId($user_id): void;

    /**
     * @param array $level_ids
     * @param array $skill_ids
     * @return array
     */
    public function fetchByLevelIdAndSkillId(array $level_ids, array $skill_ids): array;
}
