<?php

namespace App\Infrastructures\Repositories\Eloquent\Assignment;

use App\Models\Assignment;
use App\Services\Assignment\AssignmentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AssignmentRepository implements AssignmentRepositoryInterface
{
  /**
   * @inheritDoc 
   */
  public function all(): Collection
  {
    return Assignment::with('user')->with('project')->get();
  }
}
