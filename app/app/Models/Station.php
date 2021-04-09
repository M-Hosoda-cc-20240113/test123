<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Station extends Model
{
    use HasFactory;
    /**
     * 
     * Project Table relation
     * @var array
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
