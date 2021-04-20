<?php

namespace App\Services\AdminProject\ProjectList;

use App\Services\Project\ProjectRepositoryInterface;

class ProjectListService
{
  /**
   * @var ProjectRepositoryInterface
   */
  private $project_repository;

  public function __construct(
    ProjectRepositoryInterface $project_repository
  ) {
    $this->project_repository = $project_repository;
  }

  public function exec()
  {
    return $this->project_repository->all();
  }
}
