<?php

namespace App\Services\Assignment;

use App\Models\Assignment;

interface AssignmentRepositoryInterface
{
  /**
   * 稼働案件状況
   * @return Assignment
   * 
   */
   public function all();
}
