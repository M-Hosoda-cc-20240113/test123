<?php


namespace App\Services\AdminProject\DeleteSkill;


use App\Services\RelProjectSkill\RelProjectSkillRepositoryInterface;

class DeleteSkillService
{
    /**
     * @var RelProjectSkillRepositoryInterface
     */
    private $rel_project_skill_repository;

    /**
     * DeleteSkillService constructor.
     * @param RelProjectSkillRepositoryInterface $rel_project_skill_repository
     */
    public function __construct(RelProjectSkillRepositoryInterface $rel_project_skill_repository)
    {
        $this->rel_project_skill_repository = $rel_project_skill_repository;
    }

    /**
     * @param $project_id
     */
    public function deleteByProjectId($project_id): void
    {
        $this->rel_project_skill_repository->deleteByProjectId($project_id);
    }
}
