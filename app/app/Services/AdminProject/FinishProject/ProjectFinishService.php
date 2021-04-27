<?php


namespace App\Services\AdminProject\FinishProject;


use App\Models\Project;
use App\Services\Project\ProjectRepositoryInterface;

class ProjectFinishService
{
    /**
     * @var ProjectRepositoryInterface
     */
    private $project_repository;

    /**
     * CreateProjectService constructor.
     * @param \App\Services\Project\ProjectRepositoryInterface $project_repository
     */
    public function __construct(ProjectRepositoryInterface $project_repository)
    {
        $this->project_repository = $project_repository;
    }

    /**
     * @param $project_id
     */
    public function exec($project_id)
    {
        $this->project_repository->finish($project_id);
    }
}
