<?php

namespace App\Services\Assignment\AssignmentList;

use App\Services\Assignment\AssignmentRepositoryInterface;
use Illuminate\Support\Collection;

class AssignmentListService
{
  /**
   * @var AssignmentRepositoryInterface
   */
  private $assignment_reopsitory;

    /**
     * AssignmentListService constructor.
     * @param \App\Services\Assignment\AssignmentRepositoryInterface $assignment_repository
     */
    public function __construct(
    AssignmentRepositoryInterface $assignment_repository
  ) {
    $this->assignment_reopsitory = $assignment_repository;
  }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function exec(): Collection
    {
    return $this->assignment_reopsitory->all();
  }
}
