<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RelPositionProject
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RelPositionProject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelPositionProject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelPositionProject query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $position_id
 * @property int $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RelPositionProject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelPositionProject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelPositionProject wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelPositionProject whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelPositionProject whereUpdatedAt($value)
 */
class RelPositionProject extends Model
{
    use HasFactory;

     /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'rel_positions_projects';
}
