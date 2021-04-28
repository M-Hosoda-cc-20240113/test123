<?php


namespace App\Services\AdminProject\DeleteProject;


use App\Services\Project\ProjectRepositoryInterface;

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
     * @param int $project_id
     * @return void
     */
    public function exec(int $project_id)
    {
        $this->project_repository->delete($project_id);
    }
}
