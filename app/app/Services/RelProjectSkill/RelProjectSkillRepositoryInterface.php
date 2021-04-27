<?php


namespace App\Services\RelProjectSkill;


interface RelProjectSkillRepositoryInterface
{
    /**
     * @param $project_id
     */
    public function deleteByProjectId($project_id): void;
}
