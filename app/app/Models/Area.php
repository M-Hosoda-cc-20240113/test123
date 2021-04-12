<?php

namespace App\Models;

use App\Models\Station;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    /**
     * 
     * Project Table relation
     * @var array
     */
    public function stations(): HasMany
    {
        return $this->hasMany(Station::class);
    }
}
