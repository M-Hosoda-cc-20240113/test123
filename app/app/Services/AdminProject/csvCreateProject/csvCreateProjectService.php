<?php


namespace App\Services\AdminProject\csvCreateProject;


use App\Services\Project\ProjectRepositoryInterface;

/**
 * Class csvCreateProjectService
 * @package App\Services\AdminProject\csvCreateProject
 */
class csvCreateProjectService
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
     * @param \App\Services\AdminProject\csvCreateProject\csvCreateProjectParameter $parameter
     */
    public function exec(csvCreateProjectParameter $parameter)
    {
        $this->project_repository->csvCreate($parameter);
    }
}
