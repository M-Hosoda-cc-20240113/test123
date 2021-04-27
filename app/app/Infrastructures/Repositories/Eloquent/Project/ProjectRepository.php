<?php

namespace App\Infrastructures\Repositories\Eloquent\Project;

use App\Models\Project;
use App\Services\AdminProject\CreateProject\CreateProjectParameter;
use App\Services\Project\ProjectRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
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

        $skills = [$parameter->getSkill1(), $parameter->getSkill2(), $parameter->getSkill3()];
        foreach ($skills as $skill) {
            $project->skills()->syncWithoutDetaching($skill);
        }
        $positions = [$parameter->getPosition1(), $parameter->getPosition2(), $parameter->getPosition3()];
        foreach ($positions as $position) {
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
     * {@inheritDoc}
     */
    public function fetchByKeyWord(array $keywords, array $exclude_ids = [])
    {
        $query = Project::with(['station', 'positions', 'skills'])
            ->where('decided', 0)
            ->whereNotIn('id', $exclude_ids);

        foreach ($keywords as $keyword) {
            $like_keyword = '%' . $keyword . '%';
            $query->where(static function (Builder $query) use ($like_keyword) {
                $query->where('name', 'like', $like_keyword)
                    ->orWhere('description', 'like', $like_keyword)
                    ->orWhere('required_condition', 'like', $like_keyword)
                    ->orWhere('better_condition', 'like', $like_keyword)
                    ->orWhere('feature', 'like', $like_keyword);
//                    ->orWhere('station', static function (Builder $query) use ($like_keyword) {
//                        $query->where('name', 'like', $like_keyword);
//                    })
//                    ->orWhereHas('positions', static function (Builder $query) use ($like_keyword) {
//                        $query->where('name', 'like', $like_keyword);
//                    })
//                    ->orWhereHas('skills', static function (Builder $query) use ($like_keyword) {
//                        $query->where('name', 'like', $like_keyword);
//                    });
            });
        }
        return $query->get();
    }
}
