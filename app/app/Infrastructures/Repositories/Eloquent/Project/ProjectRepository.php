<?php

namespace App\Infrastructures\Repositories\Eloquent\Project;

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
    return Project::all();
  }
}
