<?php


namespace App\Services\RelLevelSkillUser;


use App\Services\User\EditSkill\UpdateSkillParameter;

interface RelLevelSkillUSerRepositoryInterface
{
    /**
     * @return mixed
     */
    public function fetchByUserId(int $user_id);


    /**
     * @param \App\Services\User\EditSkill\UpdateSkillParameter $parameter
     * @return void
     */
    public function create(UpdateSkillParameter $parameter): void;

    /**
     * @param $user_id
     */
    public function deleteByUserId($user_id): void;
}
