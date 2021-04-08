<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Position;
use App\Models\Skill;
use App\Models\Station;

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
 */
class Project extends Model
{
    use HasFactory;

    /**
     * 
     * Users Table relation
     * @var array
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'applications', 'project_id', 'user_id');
    }
    /**
     * 
     * Positions Table relation
     * @var array
     */
    public function positions(): BelongsToMany
    {
        return $this->belongsToMany(Position::class, 'rel_positions_projects', 'project_id', 'position_id');
    }

    /**
     * 
     * Skills Table relation
     * @var array
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'rel_projects_skills', 'project_id', 'skill_id');
    }

    /**
     * 
     * agents Table relation
     * @var array
     */
    public function agent(): HasMany
    {
        return $this->hasMany('App\Models\Agent');
    }

    /**
     * 
     * stations Table relation
     * @var array
     */
     public function station(): HasMany
     {
         return $this->hasMany('App\Models\Station');
     }
}
