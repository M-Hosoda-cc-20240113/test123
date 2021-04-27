<?php


namespace App\Services\AdminProject\UpdateProject;


use App\Models\Project;
use App\Services\Project\ProjectRepositoryInterface;

class UpdateProjectService
{
    /**
     * @var ProjectRepositoryInterface
     */
    private $project_repository;

    /**
     * UpdateProjectService constructor.
     * @param \App\Services\Project\ProjectRepositoryInterface $project_repository
     */
    public function __construct(ProjectRepositoryInterface $project_repository)
    {
        $this->project_repository = $project_repository;
    }

    /**
     * @param \App\Services\AdminProject\UpdateProject\UpdateProjectParameter $parameter
     * @return \App\Models\Project
     */
    public function exec(UpdateProjectParameter $parameter): Project
    {
        return $this->project_repository->update($parameter);
    }

}
