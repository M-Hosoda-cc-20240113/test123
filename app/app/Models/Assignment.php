<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;

/**
 * App\Models\Assignment
 *
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 * @property string $assignment_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Project|null $project
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereAssignmentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereUserId($value)
 * @mixin \Eloquent
 */
class Assignment extends Model
{
    use HasFactory;
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
     protected $table = 'assignment';

     /**
     * 
     * agents Table relation
     * @var array
     */

     public function user(): HasOne
     {
         return $this->HasOne(User::class,'id');
     }

     /**
     * 
     * agents Table relation
     * @var array
     */

     public function project(): HasOne
     {
         return $this->HasOne(Project::class,'id');
     }
}