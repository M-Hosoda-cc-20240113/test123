<?php

namespace App\Services\Skill;


use App\Models\Skill;
use App\Services\Skill\CreateSkill\CreateSkillParameter;
use App\Services\Skill\DeleteSkill\DeleteSkillParameter;
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
     * @param CreateSkillParameter $parameter
     * @return void
     */
    public function create(CreateSkillParameter $parameter): void;

    /**
     * @param DeleteSkillParameter $parameter
     */
    public function delete(DeleteSkillParameter $parameter): void;
}
