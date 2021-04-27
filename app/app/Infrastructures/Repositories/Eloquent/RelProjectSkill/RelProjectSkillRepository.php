<?php


namespace App\Infrastructures\Repositories\Eloquent\RelProjectSkill;


use App\Models\RelProjectSkill;
use App\Services\RelProjectSkill\RelProjectSkillRepositoryInterface;

class RelProjectSkillRepository implements RelProjectSkillRepositoryInterface
{
    /**
     * @z
     * @param $project_id
     * @throws \Exception
     */
    public function deleteByProjectId($project_id): void
    {
        RelProjectSkill::where('project_id',$project_id)->delete();
    }
}
