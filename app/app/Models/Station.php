<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Area;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Station
 *
 * @property int $id
 * @property int|null $area_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Area|null $area
 * @property-read \Illuminate\Database\Eloquent\Collection|Project[] $projects
 * @property-read int|null $projects_count
 * @method static \Illuminate\Database\Eloquent\Builder|Station newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station query()
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
