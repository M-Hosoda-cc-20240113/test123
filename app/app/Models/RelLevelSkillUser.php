<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\RelLevelSkillUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RelLevelSkillUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelLevelSkillUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelLevelSkillUser query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $skill_id
 * @property int $level_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RelLevelSkillUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelLevelSkillUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelLevelSkillUser whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelLevelSkillUser whereSkillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelLevelSkillUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelLevelSkillUser whereUserId($value)
 * @property-read \App\Models\Level $level
 * @property-read \App\Models\Skill $skill
 * @property-read \App\Models\User $user
 */
class RelLevelSkillUser extends Model
{
    use HasFactory;

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'rel_levels_skills_users';

    /**
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function skill():BelongsTo
    {
        return $this->BelongsTo(Skill::class, 'skill_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function level():BelongsTo
    {
        return $this->BelongsTo(Level::class, 'level_id', 'id');
    }
}
