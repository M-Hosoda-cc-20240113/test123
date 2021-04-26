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
    public function update(UpdateSkillParameter $parameter): void;
}
