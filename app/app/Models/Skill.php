<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\User;

class Skill extends Model
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
     * Projects Table relation
     * @var array
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }
}
