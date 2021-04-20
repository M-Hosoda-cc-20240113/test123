<?php

namespace App\Infrastructures\Repositories\Eloquent\Project;

use App\Models\Project;
use App\Services\Project\ProjectRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository implements ProjectRepositoryInterface
{
  /**
   *for Front
   * @inheritDoc
   */
  public function all(): Collection
  {
    return Project::with('station')
        ->with('positions')
        ->with('skills')
        ->get();
  }
  /**
   *for Front
   * @inheritDoc
   */
   public function findWithUsersThroughApplicationOrAssignment(int $project_id): Project
   {
    return Project::with('station')
        ->with('positions')
        ->with('skills')
        ->with('user_app')
        ->with('user_assign')
        ->findOrFail($project_id);
   }

    /**
     * @param int $project_id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function findWithUsersAndAgentThroughApplicationOrAssignment(int $project_id): Project
   {
       return Project::with('station')
           ->with('agent')
           ->with('positions')
           ->with('skills')
           ->with('user_app')
           ->with('user_assign')
           ->findOrFail($project_id);
   }
  /**
   * @inheritDoc
   *all with users table
   *for Admin
   */
   public function allWithUsers(): Collection
   {
     $projects = Project::with('agent')
         ->with('station')
         ->get();
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
