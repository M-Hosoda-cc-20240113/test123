<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use App\Notifications\PasswordResetNotification;
use Illuminate\Support\Str;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $email
 * @property string $email_hash
 * @property string $password
 * @property string $sei
 * @property string $sei_kana
 * @property string $mei
 * @property string $mei_kana
 * @property string $tel
 * @property string $birthday
 * @property int $is_receive_notification_mail
 * @property int $is_working
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Level[] $levels
 * @property-read int|null $levels_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Project[] $projects
 * @property-read int|null $projects_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Skill[] $skills
 * @property-read int|null $skills_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsReceiveNotificationMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsWorking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMeiKana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSeiKana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $points
 * @property int $is_admin
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Project[] $project
 * @property-read int|null $project_count
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePoints($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $project_app
 * @property-read int|null $project_app_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $project_assign
 * @property-read int|null $project_assign_count
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sei',
        'sei_kana',
        'mei',
        'mei_kana',
        'birthday',
        'tel',
        'tel_hash',
        'email',
        'email_hash',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email_hash',
        'tel_hash',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     *
     * Levels Table relation
     *
     * @return BelongsToMany
     */
    public function levels(): BelongsToMany
    {
        return $this->belongsToMany(Level::class, 'rel_levels_skills_users', 'user_id', 'level_id');
    }

    /**
     *
     * Skills Table relation
     *
     * @return BelongsToMany
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'rel_levels_skills_users', 'user_id', 'skill_id');
    }

    /**
     *
     * Projects Table relation
     *
     * @return BelongsToMany
     */
    public function project_app(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'applications', 'user_id', 'project_id')
            ->withPivot('created_at', 'interview_date', 'operation_start_month');
    }

    /**
     *
     * Projects Table relation
     *
     * @return BelongsToMany
     */
    public function project_assign(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'assignments', 'user_id', 'project_id')
            ->withPivot('created_at', 'assignment_start_date', 'assignment_end_date');
    }

    /**
     *
     * Projects Table relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function project_status(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'statuses', 'user_id', 'project_id')
            ->withPivot('created_at', 'status');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function points_history(): HasMany
    {
        return $this->hasMany(PointsHistory::class);
    }

    /**
     * @param $val
     * @return string
     */
    public function getSeiAttribute($val)
    {
        return Crypt::decrypt($val);
    }

    /**
     * @param $val
     */
    public function setSeiAttribute($val)
    {
        $this->attributes['sei'] = Crypt::encrypt($val);
    }

    /**
     * @param $val
     * @return string
     */
    public function getMeiAttribute($val)
    {
        return Crypt::decrypt($val);
    }

    /**
     * @param $val
     */
    public function setMeiAttribute($val)
    {
        $this->attributes['mei'] = Crypt::encrypt($val);
    }

    /**
     * @param $val
     * @return string
     */
    public function getSeiKanaAttribute($val)
    {
        return Crypt::decrypt($val);
    }

    /**
     * @param $val
     */
    public function setSeiKanaAttribute($val)
    {
        $this->attributes['sei_kana'] = Crypt::encrypt($val);
    }

    /**
     * @param $val
     * @return string
     */
    public function getMeiKanaAttribute($val)
    {
        return Crypt::decrypt($val);
    }

    /**
     * @param $val
     */
    public function setMeiKanaAttribute($val)
    {
        $this->attributes['mei_kana'] = Crypt::encrypt($val);
    }

    /**
     * @param $val
     * @return string
     */
    public function getEmailAttribute($val): string
    {
        return Crypt::decrypt($val);
    }

    /**
     * @param $val
     */
    public function setEmailAttribute($val)
    {
        $this->attributes['email'] = Crypt::encrypt($val);
    }

    /**
     * @param $val
     * @return string
     */
    public function getTelAttribute($val): string
    {
        return Crypt::decrypt($val);
    }

    /**
     * @param $val
     */
    public function setTelAttribute($val)
    {
        $this->attributes['tel'] = Crypt::encrypt($val);
    }

    /**
     * @param $val
     * @return mixed
     */
    public function getBirthdayAttribute($val)
    {
        return Crypt::decrypt($val);
    }

    /**
     * @param $val
     */
    public function setBirthdayAttribute($val)
    {
        $this->attributes['birthday'] = Crypt::encrypt($val);
    }

    /**
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token, $this));
    }

    /**
     * @param int|null $project_id
     * @return bool
     */
    public function is_apply(int $project_id = null): bool
    {
        $user_id = $this->id;
        if (!empty($project_id)) {
            $application_ids = array_column(Application::where('Project_id', $project_id)->get()->toArray(), 'user_id');
            return in_array($user_id, $application_ids);
        }
        $application_ids = array_column(Application::all()->toArray(), 'user_id');
        return in_array($user_id, $application_ids);
    }

    /**
     * @param int|null $project_id
     * @return bool
     */
    public function is_assign(int $project_id = null): bool
    {
        $user_id = $this->id;
        if (!empty($project_id)) {
            $assignment_ids = array_column(Assignment::where('Project_id', $project_id)->get()->toArray(), 'user_id');
            return in_array($user_id, $assignment_ids);
        }
        $assignment_ids = array_column(Assignment::all()->toArray(), 'user_id');
        return in_array($user_id, $assignment_ids);
    }

    /**
     * @param int $user_id
     * @return string
     */
    public static function createInviteCode(int $user_id): string
    {
        return Str::random(8) . $user_id . "_aegis";
    }
}
