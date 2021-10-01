<?php

namespace App\Infrastructures\Repositories\Eloquent\Skill;

use App\Models\Skill;
use App\Services\Skill\CreateSkill\CreateSkillParameter;
use App\Services\Skill\DeleteSkill\DeleteSkillParameter;
use App\Services\Skill\SkillRepositoryInterface;
use Illuminate\Support\Collection;

class SkillRepository implements SkillRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function all(): Collection
    {
        return Skill::all()->sortByDesc('id');
    }

    /**
     * {@inheritDoc}
     */
    public function create(CreateSkillParameter $parameter): void
    {
        $skill = new Skill();
        $skill->name = $parameter->getName();
        $skill->save();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(DeleteSkillParameter $parameter): void
    {
        $skill = Skill::findOrFail($parameter->getSkillId());
        $skill->delete();
    }
}
