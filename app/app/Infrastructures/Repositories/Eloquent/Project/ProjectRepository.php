<?php

namespace App\Infrastructures\Repositories\Eloquent\Project;

use App\Models\Application;
use App\Models\Assignment;
use App\Models\Project;
use App\Services\AdminProject\CreateProject\CreateProjectParameter;
use App\Services\AdminProject\csvCreateProject\csvCreateProjectParameter;
use App\Services\AdminProject\DeleteProject\DeleteProjectParameter;
use App\Services\AdminProject\ToggleProjectDisplay\ProjectDisplayToggleParameter;
use App\Services\AdminProject\UpdateProject\UpdateProjectParameter;
use App\Services\Project\ProjectRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectRepository
 * @package App\Infrastructures\Repositories\Eloquent\Project
 */
class ProjectRepository implements ProjectRepositoryInterface
{
    /**
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
     * @inheritDoc
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
     */
    public function create(CreateProjectParameter $parameter): Project
    {
        $project = new Project();
        $project->agent_id = $parameter->getAgentId();
        $project->station_id = $parameter->getStationId();
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
        if ($parameter->getSkillIds()[0] !== null) {
            $project->skills()->syncWithoutDetaching($parameter->getSkillIds());
        }
        if ($parameter->getPositionIds()[0] !== null) {
            $project->positions()->syncWithoutDetaching($parameter->getPositionIds());
        }
        return $project;
    }

    /**
     * @inheritDoc
     */
    public function update(UpdateProjectParameter $parameter): Project
    {
        $project = Project::findOrFail($parameter->getProjectId());
        $project->agent_id = $parameter->getAgentId();
        $project->station_id = $parameter->getStationId();
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
        if ($parameter->getSkillIds()[0] !== null) {
            $project->skills()->syncWithoutDetaching($parameter->getSkillIds());
        }
        if ($parameter->getPositionIds()[0] !== null) {
            $project->positions()->syncWithoutDetaching($parameter->getPositionIds());
        }

        return $project;
    }


    /**
     * @inheritDoc
     */
    public function fetchCanApply(): Collection
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
     * @inheritDoc
     */
    public function close(ProjectDisplayToggleParameter $parameter): Project
    {
        $project = Project::findOrFail($parameter->getProjectId());
        $project->decided = 1;
        $project->save();
        return $project;
    }

    /**
     * @inheritDoc
     */
    public function open(ProjectDisplayToggleParameter $parameter): Project
    {
        $project = Project::findOrFail($parameter->getProjectId());
        $project->decided = 0;
        $project->save();
        return $project;
    }


    /**
     * @inheritDoc
     */
    public function delete(DeleteProjectParameter $parameter): void
    {
        $project = Project::findOrFail($parameter->getProjectId());
        $project->user_app()->detach();
        $project->user_assign()->detach();
        $project->user_status()->detach();
        $project->delete();
    }

    /**
     * @inheritDoc
     */
    public function fetchAppAssignProjectId(): array
    {
        $app_project_ids = Application::select('project_id')->get()->toArray();
        $assign_project_ids = Assignment::select('project_id')->get()->toArray();
        return array_merge($app_project_ids, $assign_project_ids);
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

    public function csvCreate(csvCreateProjectParameter $parameter): void
    {
        $project = new Project();
        $project->agent_id = $parameter->getAgentId();
        $project->station_id = $parameter->getStationId();
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
        if ($parameter->getSkillIds()[0] != "") {
            $project->skills()->syncWithoutDetaching($parameter->getSkillIds());
        }
        if ($parameter->getPositionIds()[0] != "") {
            $project->positions()->syncWithoutDetaching($parameter->getPositionIds());
        }
    }
}
