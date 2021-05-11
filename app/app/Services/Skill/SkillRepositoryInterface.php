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
}
