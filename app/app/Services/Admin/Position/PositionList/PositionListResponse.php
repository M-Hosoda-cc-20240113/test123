<?php

namespace App\Services\Admin\Position\PositionList;

use App\Models\Position;
use Illuminate\Support\Collection;

class PositionListResponse
{
  /**
   * @var Position[]
   */
  private $positions;

  /**
   * Get the value of positions
   *
   * @return  Position[]
   */ 
  public function getPositions()
  {
    return $this->positions;
  }

  /**
   * Set the value of positions
   *
   * @param  Position[]  $positions
   *
   * @return  self
   */ 
  public function setPositions(Collection $positions)
  {
    $this->positions = $positions;

    return $this;
  }
}
