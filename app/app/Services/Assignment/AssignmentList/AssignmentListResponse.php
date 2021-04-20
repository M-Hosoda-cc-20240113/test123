<?php

namespace App\Services\Assignment\AssignmentList;

use App\Models\Assignment;
use Illuminate\Support\Collection;

class AssignmentListResponse
{
  /**
   * @var Assignment[]
   */
  private $assignments;

  /**
   * Get the value of assignments
   *
   * @return  Assignment[]
   */
  public function getAssignment()
  {
    return $this->assignments;
  }

    /**
     * Set the value of assignments
     *
     * @param \Illuminate\Support\Collection $assignments
     * @return  self
     */
  public function setAssignment(Collection $assignments)
  {
    $this->assignments = $assignments;

    return $this;
  }
}
