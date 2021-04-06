<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RelLevelSkillUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RelLevelSkillUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelLevelSkillUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelLevelSkillUser query()
 * @mixin \Eloquent
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
}
