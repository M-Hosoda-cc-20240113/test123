<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Area;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function area(): HasOne
     {
         return $this->HasOne(Area::class,'id');
     }
}
