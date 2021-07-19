<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\PointsHistory
 *
 * @property int $id
 * @property int $user_id
 * @property int $points
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $users
 * @method static \Illuminate\Database\Eloquent\Builder|PointsHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointsHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PointsHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|PointsHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointsHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointsHistory wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointsHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PointsHistory whereUserId($value)
 * @mixin \Eloquent
 */
class PointsHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'points',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
