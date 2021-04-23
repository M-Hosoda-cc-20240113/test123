<?php

namespace App\Services\AdminProject\CreateProject;

use App\Services\Project\ProjectRepositoryInterface;

class CreateProjectService
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
     * @param \App\Services\AdminProject\CreateProject\CreateProjectParameter $parameter
     *
     */
    public function exec(CreateProjectParameter $parameter)
    {
        return $this->project_repository->create($parameter);
    }
}
