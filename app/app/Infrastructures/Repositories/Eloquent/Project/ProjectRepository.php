<?php

namespace App\Infrastructures\Repositories\Eloquent\Project;

use App\Models\Application;
use App\Models\Assignment;
use App\Models\Project;
use App\Services\AdminProject\CreateProject\CreateProjectParameter;
use App\Services\AdminProject\DeleteProject\DeleteProjectParameter;
use App\Services\AdminProject\UpdateProject\UpdateProjectParameter;
use App\Services\Project\ProjectRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

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
     * @throws \Throwable
     */
    public function create(CreateProjectParameter $parameter): Project
    {
        $project = new Project();
        $project->agent_id = $parameter->getAgent();
        $project->station_id = $parameter->getStation();
        $project->name = $parameter->getName();
        $project->min_unit_price = $parameter->getMinUnitPrice();
        $project->max_unit_price = $parameter->getMaxUnitPrice();
        $project->min_operation_time = $parameter->getMinOperationTime();
        $project->max_operation_time = $parameter->getMaxOperationTime();
        $project->description = $parameter->getDescription();
        $project->required_condition = $parameter->getRequiredCondition();
        $project->better_condition = $parameter->getBetterCondition();
        $project->work_start = $parameter->getWorkStart();
        $project->work_end = $parameter->getWorkEnd();
        $project->weekly_attendance = $parameter->getWeeklyAttendance();
        $project->feature = $parameter->getFeature();
        $project->save();

        foreach ($parameter->getSkillIds() as $skill) {
            $project->skills()->syncWithoutDetaching($skill);
        }
        foreach ($parameter->getPositionIds() as $position) {
            $project->positions()->syncWithoutDetaching($position);
        }
        return $project;
    }

    public function update(UpdateProjectParameter $parameter): Project
    {
        $project = Project::findOrFail($parameter->getProjectId());
        $project->agent_id = $parameter->getAgent();
        $project->station_id = $parameter->getStation();
        $project->name = $parameter->getName();
        $project->min_unit_price = $parameter->getMinUnitPrice();
        $project->max_unit_price = $parameter->getMaxUnitPrice();
        $project->min_operation_time = $parameter->getMinOperationTime();
        $project->max_operation_time = $parameter->getMaxOperationTime();
        $project->description = $parameter->getDescription();
        $project->required_condition = $parameter->getRequiredCondition();
        $project->better_condition = $parameter->getBetterCondition();
        $project->work_start = $parameter->getWorkStart();
        $project->work_end = $parameter->getWorkEnd();
        $project->weekly_attendance = $parameter->getWeeklyAttendance();
        $project->feature = $parameter->getFeature();
        $project->save();

        foreach ($parameter->getSkillIds() as $skill) {
            $project->skills()->syncWithoutDetaching($skill);
        }

        foreach ($parameter->getPositionIds() as $position) {
            $project->positions()->syncWithoutDetaching($position);
        }

        return $project;
    }


    /**
     * @inheritDoc
     */
    public function fetchCanApply()
    {
        return Project::with('station')
            ->with('positions')
            ->with('skills')
            ->where('decided', 0)
            ->get();
    }


    /**
     * @param $project_id
     * @return \App\Models\Project|void
     */
    public function close($project_id): Project
    {
        $project = Project::findOrFail($project_id);
        $project->decided = 1;
        $project->save();
        return $project;
    }

    /**
     * @param $project_id
     * @return \App\Models\Project
     */
    public function open($project_id): Project
    {
        $project = Project::findOrFail($project_id);
        $project->decided = 0;
        $project->save();
        return $project;
    }


    /**
     * @inheritDoc
     * @param \App\Services\AdminProject\DeleteProject\DeleteProjectParameter $parameter
     * @throws \Exception
     */
    public function delete(DeleteProjectParameter $parameter): void
    {
        $project = Project::findOrFail($parameter->getProjectId());
        $project->delete();
    }

    /**
     * @return array
     */
    public function fetchAppAssignProjectId(): array
    {
        $app_project_ids = Application::select('project_id')->get()->toArray();
        $assign_project_ids = Assignment::select('project_id')->get()->toArray();
        return array_merge($app_project_ids, $assign_project_ids);
    }
}
