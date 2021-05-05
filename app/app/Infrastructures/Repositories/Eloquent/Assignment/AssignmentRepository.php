<?php

namespace App\Infrastructures\Repositories\Eloquent\Assignment;

use App\Models\Application;
use App\Models\Assignment;
use App\Models\Project;
use App\Models\Status;
use App\Models\User;
use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
use App\Services\Assignment\AssignmentRepositoryInterface;
use App\Services\Assignment\DeleteAssignment\DeleteAssignmentParameter;
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
        return Assignment::with('users')
            ->with('projects')
            ->get();
    }

    /**
     * @inheritDoc
     * @param RegisterAssignmentParameter $parameter
     * @return array
     */
    public function register(RegisterAssignmentParameter $parameter): array
    {
        $assignment = new Assignment();
        $assignment->user_id = $parameter->getUserId();
        $assignment->project_id = $parameter->getProjectId();
        $assignment->save();

        Application::where('user_id', $parameter->getUserId())
            ->where('project_id', $parameter->getProjectId())
            ->delete();

        $status = Status::where('user_id', $parameter->getUserId())
            ->where('project_id', $parameter->getProjectId())
            ->firstOrFail();
        $status->status = 3;
        $status->save();

        $user = User::findOrFail($parameter->getUserId());
        $user->is_working = 1;
        $user->save();

        $project = Project::findOrFail($parameter->getProjectId());
        $project->decided = 1;
        $project->save();

        $user_name = $user->sei . " " . $user->mei;
        $project_name = "【" . $project->name . "】";

        return ['user_name' => $user_name, 'project_name' => $project_name];
    }


    /**
     * @inheritDoc
     * @param UpdateUserAdminParameter $parameter
     */
    public function updateAdmin(UpdateUserAdminParameter $parameter): void
    {
        if (!empty($parameter->getProjectAssignId())) {
            $assignment = Assignment::where('user_id', $parameter->getUserId())
                ->where('project_id', $parameter->getProjectAssignId())
                ->firstOrFail();
            $assignment->assignment_start_date = $parameter->getAssignmentStartDate() ?? null;
            $assignment->assignment_end_date = $parameter->getAssignmentEndDate() ?? null;
            $assignment->save();
        }
    }

    public function delete(DeleteAssignmentParameter $parameter): void
    {
        Assignment::where('user_id', $parameter->getUserId())
            ->where('project_id', $parameter->getProjectId())
            ->delete();
        Status::where('user_id', $parameter->getUserId())
            ->where('project_id', $parameter->getProjectId())
            ->delete();

        $user = User::where('id', $parameter->getUserId())
            ->firstOrFail();
        $user->is_working = 0;
        $user->save();
    }
}
