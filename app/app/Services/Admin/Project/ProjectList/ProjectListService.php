<?php

namespace App\Services\Admin\Project\ProjectList;

use App\Services\Admin\Project\ProjectRepositoryInterface;

class ProjectListService
{
  /**
   * @var ProjectRepositoryInterface
   */
  private $project_reopsitory;

  public function __construct(
    ProjectRepositoryInterface $project_repository
  ) {
    $this->project_reopsitory = $project_repository; 
  }

  public function exec()
  {
    return $this->project_reopsitory->all();
  }
}