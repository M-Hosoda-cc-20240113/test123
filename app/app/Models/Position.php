<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

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
