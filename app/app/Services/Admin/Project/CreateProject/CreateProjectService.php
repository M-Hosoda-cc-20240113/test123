<?php

namespace App\Services\Admin\Project\CreateProject;

use App\Services\Admin\Project\ProjectRepositoryInterface;

class CreateProjectService
{
  /**
   * @var ProjectRepositoryInterface
   */
  private $project_repository;

  public function __construct(ProjectRepositoryInterface $project_repository)
  {
    $this->project_repository = $project_repository;  
  }

  public function exec()
  {
    $this->create(); 
  }
}
