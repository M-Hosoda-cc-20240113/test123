<?php

namespace App\Infrastructures\Repositories\Eloquent\Project;

// use Illuminate\Support\Facades\DB;
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
    return Project::with('station')->with('positions')->with('skills')->get();
  }
  /**
   *for Front
   * @inheritDoc
   */
   public function detail(int $id): Project
   {
    return Project::with('station')->with('positions')->with('skills')->findOrFail($id);
   }
  /**
   * @inheritDoc
   *all with users table
   *for Admin
   */
   public function allWithUsers(): Collection
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
