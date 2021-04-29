<?php

namespace App\Infrastructures\Repositories\Eloquent\Project;

use App\Models\Project;
use App\Models\RelProjectSkill;
use App\Services\AdminProject\CreateProject\CreateProjectParameter;
use App\Services\AdminProject\UpdateProject\UpdateProjectParameter;
use App\Services\Project\ProjectRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class ProjectRepository
 * @package App\Infrastructures\Repositories\Eloquent\Project
 */
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

    /**
     * @param \App\Services\AdminProject\UpdateProject\UpdateProjectParameter $parameter
     * @return \App\Models\Project
     */
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
                    ->orWhere('feature', 'like', $like_keyword)
                    ->orWhereHas('station', static function (Builder $query) use ($like_keyword) {
                        $query->where('name', 'like', $like_keyword);
                    })
                    ->orWhereHas('positions', static function (Builder $query) use ($like_keyword) {
                        $query->where('name', 'like', $like_keyword);
                    })
                    ->orWhereHas('skills', static function (Builder $query) use ($like_keyword) {
                        $query->where('name', 'like', $like_keyword);
                    });
            });
        }
        return $query->get();
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
     * {@inheritDoc}
     */
    public function fetchBySkillIds(array $skill_ids, array $exclude_ids = [])
    {
        $length = count($skill_ids);
        $arr = join(",", $skill_ids);
        $target_ids = \DB::select(\DB::raw("(
            SELECT p.id FROM projects AS p
            INNER JOIN 
            (
                SELECT rps.project_id, count(*) AS s
                FROM rel_projects_skills AS rps
                WHERE rps.skill_id IN (". $arr .")   
                GROUP BY rps.project_id
                HAVING s = $length
            ) AS summary
            ON p.id = summary.project_id
        )"));

        return Project::with(['station', 'positions', 'skills'])
            ->where('decided', 0)
            ->whereNotIn('id', $exclude_ids)
            ->whereIn('id', array_column($target_ids, 'id'))
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByPositionIds(array $position_ids, array $exclude_ids = [])
    {
        $length = count($position_ids);
        $arr = join(",", $position_ids);
        $target_ids = \DB::select(\DB::raw("(
            SELECT p.id FROM projects AS p
            INNER JOIN 
            (
                SELECT rpp.project_id, count(*) AS s
                FROM rel_positions_projects AS rpp
                WHERE rpp.position_id IN (". $arr .")   
                GROUP BY rpp.project_id
                HAVING s = $length
            ) AS summary
            ON p.id = summary.project_id
        )"));

        return Project::with(['station', 'positions', 'skills'])
            ->where('decided', 0)
            ->whereNotIn('id', $exclude_ids)
            ->whereIn('id', array_column($target_ids, 'id'))
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByStationIds(array $station_ids, array $exclude_ids = [])
    {
        return Project::with(['station', 'positions', 'skills'])
            ->where('decided', 0)
            ->whereNotIn('id', $exclude_ids)
            ->where(static function (Builder $query) use ($station_ids) {
                $query->whereHas('station', static function (Builder $query) use ($station_ids) {
                    $query->whereIn('stations.id', $station_ids);
                });
            })
            ->get();
    }
}
