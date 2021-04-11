<?php

namespace App\Services\Project\ProjectDetail;

use App\Models\Project;
use Illuminate\Support\Collection;

class ProjectDetailResponse
{
  /**
   * @var Project[]
   */
  private $projects;

  /**
   * Get the value of projects
   *
   * @return  Project[]
   */ 
  public function getProjects()
  {
    return $this->projects;
  }

  /**
   * Set the value of projects
   *
   * @param  Project[]  $projects
   *
   * @return  self
   */ 
  public function setProjects(Collection $projects)
  {
    $this->projects = $projects;

    return $this;
  }
}
