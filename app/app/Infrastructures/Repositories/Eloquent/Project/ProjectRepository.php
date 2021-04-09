<?php

namespace App\Infrastructures\Repositories\Eloquent\Project;

use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Services\Admin\Project\ProjectRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository implements ProjectRepositoryInterface
{
  /**
   * @inheritDoc 
   */
  public function all(): Collection
  {
    $projects = Project::with('agent')->with('station')->get();
    return $projects;
  }

  /**
   * {@inheritDoc}
   */
  public function create(): Project
  {
    $project = new Project(); 
    return $project;
  }
}
