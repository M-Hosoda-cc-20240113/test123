<?php


namespace App\Services\RelLevelSkillUser;


interface RelLevelSkillUSerRepositoryInterface
{
    /**
     * @return mixed
     */
    public function fetchByUserId(int $user_id);
}
