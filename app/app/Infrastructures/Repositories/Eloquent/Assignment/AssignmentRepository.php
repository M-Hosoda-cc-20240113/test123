<?php

namespace App\Infrastructures\Repositories\Eloquent\Assignment;

use App\Models\User;
use App\Services\Assignment\AssignmentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AssignmentRepository implements AssignmentRepositoryInterface
{
  /**
   * @inheritDoc
   */
  public function all(): Collection
  {
      return User::with('project_assign')
          ->whereHas('project_assign',function($q){
              $q->whereExists(function($q){
                  return $q;
              });
          })->get();
  }
}
