<?php

namespace App\Infrastructures\Repositories\Eloquent\Application;

use App\Models\User;
use App\Services\Application\ApplicationRepositoryInterface;

class ApplicationRepository implements ApplicationRepositoryInterface
{
  /**
   * @inheritDoc
   */
  public function all()
  {
      return User::with('project_app')
          ->whereHas('project_app',function($q){
          $q->whereExists(function($q){
             return $q;
          });
      })->get();
  }

    /**
     * @param $project_id
     * @param $user
     * @return void
     */
    public function create($project_id,$user)
  {
      $user->project_app()->attach($project_id);
  }
}
