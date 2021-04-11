<?php

namespace App\Services\Project\ProjectDetail;

use App\Services\Project\ProjectRepositoryInterface;

class ProjectDetailService
{
  /**
   * @var ProjectRepositoryInterface
   */
  private $project_reopsitory;

  public function __construct(ProjectRepositoryInterface $project_repository) 
  {
    $this->project_reopsitory = $project_repository;
  }

  public function exec(int $id)
  {
    return $this->project_reopsitory->detail($id);
  }
}
