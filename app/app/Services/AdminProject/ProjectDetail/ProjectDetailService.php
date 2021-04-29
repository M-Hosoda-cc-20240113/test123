<?php

namespace App\Services\AdminProject\ProjectDetail;

use App\Services\Project\ProjectRepositoryInterface;

class ProjectDetailService
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
     * @return \App\Models\Project
     */
    public function exec(int $project_id)
  {
    return $this->project_repository->findWithUsersAndAgentThroughApplicationOrAssignment($project_id);
  }
}
