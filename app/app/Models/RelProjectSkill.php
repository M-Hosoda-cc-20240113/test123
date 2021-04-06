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
 */
class RelProjectSkill extends Model
{
    use HasFactory;
     /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'rel_projects_skills_users';
}
