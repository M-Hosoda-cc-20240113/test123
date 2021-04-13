<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use App\Models\Level;
use App\Models\Skill;
use App\Models\Project;

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
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'name',
        'sei',
        'sei_kana',
        'mei',
        'mei_kana',
        'email',
        'birthday',
        'tel',
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
     * @var array
     */
    public function levels(): BelongsToMany
    {
        return $this->belongsToMany(Level::class, 'rel_levels_skills_users', 'user_id', 'level_id');
    }
    /**
     * 
     * Skills Table relation
     * @var array
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class,'rel_l evels_skills_users', 'user_id', 'skill_id');
    }

    /**
     * 
     * Projects Table relation
     * @var array
     */
    public function project(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'applications', 'user_id', 'project_id');
    }
}
