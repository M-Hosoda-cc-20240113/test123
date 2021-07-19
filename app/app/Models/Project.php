<?php

namespace App\Models;

use App\Services\Project\ProjectRepositoryInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $name
 * @property int|null $min_unit_price
 * @property int $max_unit_price
 * @property int|null $min_operation_time
 * @property int $max_operation_time
 * @property string $description
 * @property string|null $required_condition
 * @property string|null $better_condition
 * @property string|null $work_start
 * @property string|null $work_end
 * @property int|null $weekly_attendance
 * @property string|null $feature
 * @property string $place
 * @property int $decided
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Position[] $positions
 * @property-read int|null $positions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Skill[] $skills
 * @property-read int|null $skills_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereBetterCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDecided($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereFeature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereMaxOperationTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereMaxUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereMinOperationTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereMinUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereRequiredCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereWeeklyAttendance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereWorkEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereWorkStart($value)
 * @mixin \Eloquent
 * @property int|null $agent_id
 * @property int|null $station_id
 * @property-read \App\Models\Agent|null $agent
 * @property-read \Illuminate\Database\Eloquent\Collection|Position[] $position
 * @property-read int|null $position_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Skill[] $skill
 * @property-read int|null $skill_count
 * @property-read Station|null $station
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStationId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $user_app
 * @property-read int|null $user_app_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $user_assign
 * @property-read int|null $user_assign_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $user_status
 * @property-read int|null $user_status_count
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'station_id',
        'name',
        'min_unit_price',
        'max_unit_price',
        'min_operation_time',
        'max_operation_time',
        'description',
        'required_condition',
        'better_condition',
        'work_start',
        'work_end',
        'weekly_attendance',
        'feature',
    ];

    /**
     *
     * Users Table relation
     *
     * @return BelongsToMany
     */
    public function user_app(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'applications', 'project_id', 'user_id')
            ->withPivot('created_at');
    }

    /**
     *
     * Users Table relation
     *
     * @return BelongsToMany
     */
    public function user_assign(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'assignments', 'project_id', 'user_id')
            ->withPivot('created_at');
    }

    /**
     * @return BelongsToMany
     */
    public function user_status(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'statuses', 'project_id', 'user_id')
            ->withPivot('status');
    }

    /**
     *
     * Positions Table relation
     *
     * @return BelongsToMany
     */
    public function positions(): BelongsToMany
    {
        return $this->belongsToMany(Position::class, 'rel_positions_projects', 'project_id', 'position_id');
    }

    /**
     *
     * Skills Table relation
     *
     * @return BelongsToMany
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'rel_projects_skills', 'project_id', 'skill_id');
    }

    /**
     *
     * agents Table relation
     *
     * @return BelongsTo
     */

    public function agent(): BelongsTo
    {
        return $this->BelongsTo(Agent::class, 'agent_id', 'id');
    }

    /**
     *
     * stations Table relation
     *
     * @return BelongsTo
     */
    public function station(): BelongsTo
    {
        return $this->BelongsTo(Station::class, 'station_id', 'id');
    }

    /**
     * @param int $project_id
     * @return bool
     */
    public static function can_delete(int $project_id): bool
    {
        $project_repository = resolve(ProjectRepositoryInterface::class);
        $project_ids = array_column($project_repository->fetchAppAssignProjectId(),'project_id');
        return !in_array($project_id, $project_ids);
    }
}
