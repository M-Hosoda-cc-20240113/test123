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
  public function getAssignments()
  {
    return $this->assignments;
  }

  /**
   * Set the value of assignments
   *
   * @param  Assignment[]  
   *
   * @return  self
   */ 
  public function setAssignments(Collection $assignments)
  {
    $this->assignments = $assignments;

    return $this;
  }
}
