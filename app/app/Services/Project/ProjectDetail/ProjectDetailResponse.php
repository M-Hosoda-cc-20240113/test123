<?php

namespace App\Services\Project\ProjectDetail;

use App\Models\Project;
use Illuminate\Support\Collection;

class ProjectDetailResponse
{
  /**
   * @var Project[]
   */
  private $project;

  /**
   * Get the value of project
   *
   * @return  Project[]
   */ 
  public function getProject()
  {
    return $this->project;
  }

  /**
   * Set the value of project
   *
   * @param  Project[]  $project
   *
   * @return  self
   */ 
  public function setProject(Project $project)
  {
    $this->project = $project;

    return $this;
  }
}
