<?php

namespace App\Services\Admin\Position\PositionList;

use App\Services\Admin\Position\PositionRepositoryInterface;

class PositionListService
{
  /**
   * @var PositionRepositoryInterface
   */
  private $position_reopsitory;

  public function __construct(
    PositionRepositoryInterface $position_repository
  ) {
    $this->position_reopsitory = $position_repository; 
  }

  public function exec()
  {
    return $this->position_reopsitory->all();
  }
}
