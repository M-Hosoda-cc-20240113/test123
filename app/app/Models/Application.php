<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\Application
 *
 * @property int $id
 * @property int $user_id
 * @property int $peoject_id
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
 * @property int $project_id
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

}
