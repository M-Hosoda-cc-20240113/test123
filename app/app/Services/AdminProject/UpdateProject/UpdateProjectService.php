<?php


namespace App\Services\AdminProject\UpdateProject;


use App\Infrastructures\Repositories\Eloquent\Project\ProjectRepository;
use App\Services\Project\ProjectRepositoryInterface;

class UpdateProjectService
{
    /**
     * @var
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

    public function exec(UpdateProjectParameter $parameter)
    {
        return $this->project_repository->update($parameter);
    }

}
