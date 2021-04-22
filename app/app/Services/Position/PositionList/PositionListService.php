<?php

namespace App\Services\Position\PositionList;

use App\Services\Position\PositionRepositoryInterface;

class PositionListService
{
  /**
   * @var PositionRepositoryInterface
   */
  private $position_repository;

  public function __construct(
    PositionRepositoryInterface $position_repository
  ) {
    $this->position_repository = $position_repository;
  }

  public function exec()
  {
    return $this->position_repository->all();
  }
}
