<?php


namespace App\Services\AdminProject\csvCreateProject;


use App\Services\Project\ProjectRepositoryInterface;

/**
 * Class csvCreateProjectService
 * @package App\Services\AdminProject\csvCreateProject
 */
class CsvCreateProjectService
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
     * @param \App\Services\AdminProject\csvCreateProject\CsvCreateProjectParameter $parameter
     */
    public function exec(CsvCreateProjectParameter $parameter)
    {
        $this->project_repository->csvCreate($parameter);
    }
}
