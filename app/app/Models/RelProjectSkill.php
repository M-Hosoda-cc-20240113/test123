<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RelProjectSkill
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RelProjectSkill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelProjectSkill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelProjectSkill query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $project_id
 * @property int $skill_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RelProjectSkill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelProjectSkill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelProjectSkill whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelProjectSkill whereSkillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelProjectSkill whereUpdatedAt($value)
 */
class RelProjectSkill extends Model
{
    use HasFactory;
     /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'rel_projects_skills';
}
