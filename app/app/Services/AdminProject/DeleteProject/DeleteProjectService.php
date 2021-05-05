<?php


namespace App\Services\AdminProject\DeleteProject;


use App\Services\Project\ProjectRepositoryInterface;

/**
 * Class DeleteProjectService
 * @package App\Services\AdminProject\DeleteProject
 */
class DeleteProjectService
{
    /**
     * @var ProjectRepositoryInterface
     */
    private $project_repository;

    /**
     * ProjectDetailService constructor.
     * @param \App\Services\Project\ProjectRepositoryInterface $project_repository
     */
    public function __construct(ProjectRepositoryInterface $project_repository)
    {
        $this->project_repository = $project_repository;
    }

    /**
     * @param DeleteProjectParameter $parameter
     * @return void
     */
    public function exec(DeleteProjectParameter $parameter)
    {
        $this->project_repository->delete($parameter);
    }
}
