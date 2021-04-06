<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Position;
use App\Models\Skill;

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
        return $this->belongsToMany(User::class);
    }
    /**
     * 
     * Positions Table relation
     * @var array
     */
    public function positions(): BelongsToMany
    {
        return $this->belongsToMany(Position::class,'rel_positions_projects','project_id','position_id');
    }

    /**
     * 
     * Skills Table relation
     * @var array
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class,'rel_projects_skills','project_id','skill_id');
    }
}
