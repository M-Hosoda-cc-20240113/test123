<?php


namespace App\Services\AdminProject\ToggleProjectDisplay;


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
     * @param ProjectDisplayToggleParameter $parameter
     */
    public function exec(ProjectDisplayToggleParameter $parameter)
    {
        $project_id = $parameter->getProjectId();
        $project = $this->project_repository->findWithUsersAndAgentThroughApplicationOrAssignment($project_id);
        $project->decided ? $this->project_repository->open($parameter) : $this->project_repository->close($parameter);
    }
}
