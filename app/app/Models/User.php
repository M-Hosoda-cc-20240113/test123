<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

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
        return $this->belongsToMany('App\Models\Level','rel_levels_skills_users','user_id','level_id');
    }
    /**
     * 
     * Skills Table relation
     * @var array
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Skill','rel_levels_skills_users','user_id','skill_id');
    }

    /**
     * 
     * Projects Table relation
     * @var array
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Project','applications','user_id','project_id');
    }
}
