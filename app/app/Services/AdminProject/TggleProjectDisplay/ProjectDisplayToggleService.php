<?php


namespace App\Services\AdminProject\TggleProjectDisplay;


use App\Services\Project\ProjectRepositoryInterface;

class ProjectDisplayToggleService
{
    /**
     * @var ProjectRepositoryInterface
     */
    private $project_repository;

    public function __construct(ProjectRepositoryInterface $project_repository)
    {
        $this->project_repository = $project_repository;
    }

    /**
     * @param int $project_id
     */
    public function exec(int $project_id)
    {
        $project = $this->project_repository->findWithUsersAndAgentThroughApplicationOrAssignment($project_id);
        $project->decided ? $this->project_repository->open($project_id) : $this->project_repository->close($project_id);
    }
}
