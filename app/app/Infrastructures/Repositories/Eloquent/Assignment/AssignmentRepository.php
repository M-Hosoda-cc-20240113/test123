<?php

namespace App\Infrastructures\Repositories\Eloquent\Assignment;

use App\Models\Application;
use App\Models\Assignment;
use App\Models\Project;
use App\Models\User;
use App\Services\Assignment\AssignmentRepositoryInterface;
use App\Services\Assignment\RegisterAssignment\RegisterAssignmentParameter;
use Illuminate\Database\Eloquent\Collection;

class AssignmentRepository implements AssignmentRepositoryInterface
{

    /**
     * @inheritDoc
     * @return Collection
     */
    public function all(): Collection
    {
        return  Assignment::with('users')
            ->with('projects')
            ->get();
    }

    /**
     * @inheritDoc
     * @param RegisterAssignmentParameter $parameter
     * @return bool
     */
    public function register(RegisterAssignmentParameter $parameter): Assignment
    {
        $assignment = new Assignment();
        $assignment->user_id = $parameter->getUserId();
        $assignment->project_id = $parameter->getProjectId();
        $assignment->save();

        Application::where('user_id',$parameter->getUserId())
            ->where('project_id',$parameter->getProjectId())
            ->delete();

        $user = User::findOrFail($parameter->getUserId());
        $user->is_working = 1;
        $user->save();

        $project = Project::findOrFail($parameter->getProjectId());
        $project->decided = 1;
        $project->save();

        return $assignment;
    }
}
