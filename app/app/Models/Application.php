<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\Application
 *
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 * @property string $application_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Application newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application query()
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereApplicationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application wherePeojectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereUserId($value)
 * @mixin \Eloquent
 * @property-read Project|null $project
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereProjectId($value)
 */
class Application extends Pivot
{
    use HasFactory;

     /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'applications';

    protected $fillable = [
        'user_id',
        'project_id',
    ];

    /**
     * @return BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function projects(): BelongsTo
    {
        return $this->BelongsTo(Project::class, 'project_id', 'id');
    }
}
