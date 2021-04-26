<?php

namespace App\Services\AdminProject\ProjectDetail;

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
     * @return Project
     */
  public function getProject(): Project
  {
    return $this->project;
  }

    /**
     * Set the value of project
     *
     * @param Project $project
     *
     * @return  self
     */
  public function setProject(Project $project): ProjectDetailResponse
  {
    $this->project = $project;
    return $this;
  }
}
