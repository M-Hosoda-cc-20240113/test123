<?php

namespace App\Services\Project\ProjectDetail;

use App\Services\Project\ProjectRepositoryInterface;

class ProjectDetailService
{
    /**
     * @var ProjectRepositoryInterface
     */
    private $project_repository;

    /**
     * ProjectDetailService constructor.
     * @param ProjectRepositoryInterface $project_repository
     */
    public function __construct(ProjectRepositoryInterface $project_repository)
    {
        $this->project_repository = $project_repository;
    }

    /**
     * @return \App\Models\Project
     */
    public function exec($project_id)
    {
        return $this->project_repository->findWithUsersThroughApplicationOrAssignment($project_id);
    }
}
