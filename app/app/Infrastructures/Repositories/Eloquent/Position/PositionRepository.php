<?php

namespace App\Infrastructures\Repositories\Eloquent\Position;

use App\Models\Position;
use App\Services\Admin\Position\PositionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PositionRepository implements PositionRepositoryInterface
{
  /**
   * @inheritDoc 
   */
  public function all(): Collection
  {
    return Position::all();
  }
}
