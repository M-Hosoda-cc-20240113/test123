<?php

namespace App\Infrastructures\Repositories\Eloquent\Project;

use App\Models\Project;
use App\Models\RelLevelSkillUser;
use App\Models\Skill;
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
     * {@inheritDoc}
     */
    public function create($request): Project
    {
        $project = Project::create([
            'agent_id'           => $request['agent_id'],
            'station_id'         => $request['station_id'],
            'name'               => $request['name'],
            'min_unit_price'     => $request['min_unit_price'],
            'max_unit_price'     => $request['max_unit_price'],
            'min_operation_time' => $request['min_operation_time'],
            'max_operation_time' => $request['max_operation_time'],
            'description'        => $request['description'],
            'required_condition' => $request['required_condition'],
            'better_condition'   => $request['better_condition'],
            'work_start'         => $request['work_start'],
            'work_end'           => $request['work_end'],
            'weekly_attendance'  => $request['weekly_attendance'],
            'feature'            => $request['feature'],
        ]);
        $skills = [$request['skill_id_1'],$request['skill_id_2'],$request['skill_id_3']];
        $positions = [$request['position_id_1'],$request['position_id_2'],$request['position_id_3']];
            $project->skills()->sync($request['skill_id']);
        $project->positions()->sync($request['position_id']);
        return $project;
    }

    /**
     * {@inheritDoc}
     */
    public function fetchCanApply()
    {
        return Project::with('station')
            ->with('positions')
            ->with('skills')
            ->where('decided', 0)
            ->get();
    }
}
