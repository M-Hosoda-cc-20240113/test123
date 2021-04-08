<?php

namespace App\Infrastructures\Repositories\Eloquent\Skill;

use App\Models\Skill;
use App\Services\Admin\Skill\SkillRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SkillRepository implements SkillRepositoryInterface
{
  /**
   * @inheritDoc 
   */
  public function all(): Collection
  {
    return Skill::all();
  }
}
