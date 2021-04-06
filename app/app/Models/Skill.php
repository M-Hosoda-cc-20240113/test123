<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany('App\Models\User');
    }
    /**
     * 
     * Projects Table relation
     * @var array
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Project');
    }
}
