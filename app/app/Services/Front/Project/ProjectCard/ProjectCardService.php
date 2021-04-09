<?php

namespace App\Services\Front\Project\ProjectCard;

use App\Services\Front\Project\ProjectRepositoryInterface;

class ProjectCardService
{
  /**
   * @var ProjectRepositoryInterface
   */
  private $project_reopsitory;
  
  public function __construct(ProjectRepositoryInterface $project_repository) 
  {
    $this->project_reopsitory = $project_repository; 
  }

  public function exec()
  {
    return $this->project_reopsitory->all();
  }
}
