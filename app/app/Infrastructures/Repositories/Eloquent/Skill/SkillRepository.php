<?php

namespace App\Infrastructures\Repositories\Eloquent\Skill;

use App\Models\Skill;
use App\Services\Skill\SkillRepositoryInterface;
use Illuminate\Support\Collection;

class SkillRepository implements SkillRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function all(): Collection
    {
        return Skill::all();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchBySkillId(array $skill_ids): Collection
    {
        return Skill::whereIn('id', $skill_ids)
            ->get();
    }
}
