<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agent extends Model
{
    use HasFactory;

    /**
     * 
     * Project Table relation
     * @var array
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
