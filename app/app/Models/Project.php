<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany('App\Models\User');
    }
    /**
     * 
     * Positions Table relation
     * @var array
     */
    public function positions(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Position','rel_positions_projects','project_id','position_id');
    }

    /**
     * 
     * Skills Table relation
     * @var array
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Skill','rel_projects_skills','project_id','skill_id');
    }
}
