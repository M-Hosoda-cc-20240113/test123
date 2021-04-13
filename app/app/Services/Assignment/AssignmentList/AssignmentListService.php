<?php

namespace App\Services\Assignment\AssignmentList;

use App\Services\Assignment\AssignmentRepositoryInterface;

class AssignmentListService
{
  /**
   * @var AssignmentRepositoryInterface
   */
  private $assignment_reopsitory;

  public function __construct(
    AssignmentRepositoryInterface $assignment_repository
  ) {
    $this->assignment_reopsitory = $assignment_repository; 
  }

  public function exec()
  {
    return $this->assignment_reopsitory->all();
  }
}
