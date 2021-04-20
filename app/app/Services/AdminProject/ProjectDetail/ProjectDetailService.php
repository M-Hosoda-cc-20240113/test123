<?php

namespace App\Services\AdminProject\ProjectDetail;

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
    return $this->project_repository->findWithAgent($project_id);
  }
}
