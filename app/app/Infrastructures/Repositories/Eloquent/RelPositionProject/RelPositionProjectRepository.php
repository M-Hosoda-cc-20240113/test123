<?php


namespace App\Infrastructures\Repositories\Eloquent\RelPositionProject;


use App\Models\RelPositionProject;
use App\Services\RelPositionProject\RelPositionProjectRepositoryInterface;

class RelPositionProjectRepository implements RelPositionProjectRepositoryInterface
{
    /**
     * @param $project_id
     * @throws \Exception
     */
    public function deleteByProjectId($project_id): void
    {
        RelPositionProject::where('project_id', $project_id)->delete();
    }
}
