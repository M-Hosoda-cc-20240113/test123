<?php

namespace App\Services\Skill;


use App\Models\Skill;
use Illuminate\Support\Collection;

/**
 * Interface SkillRepositoryInterface
 * @package App\Services\Skill
 */
interface SkillRepositoryInterface
{
    /**
     * @return Skill[]|Collection
     */
    public function all(): Collection;

    /**
     * @param array $skill_ids
     * @return \Illuminate\Support\Collection
     */
    public function fetchBySkillId(array $skill_ids): Collection;
}
