<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class Level extends Model
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
}
