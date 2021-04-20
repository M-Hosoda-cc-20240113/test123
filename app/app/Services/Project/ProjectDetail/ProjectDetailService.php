<?php

namespace App\Services\Project\ProjectDetail;

use App\Services\Project\ProjectRepositoryInterface;

class ProjectDetailService
{
  /**
   * @var ProjectRepositoryInterface
   */
  private $project_repository;

  public function __construct(ProjectRepositoryInterface $project_repository)
  {
    $this->project_repository = $project_repository;
  }

  public function exec(int $project_id)
  {
    return $this->project_repository->findWithUsersThroughApplicationOrAssignment($project_id);
  }
}
