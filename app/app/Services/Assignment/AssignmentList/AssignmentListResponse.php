<?php

namespace App\Services\Assignment\AssignmentList;

use Illuminate\Pagination\LengthAwarePaginator;

class AssignmentListResponse
{
    /**
     * @var LengthAwarePaginator
     */
    private $assignments;

    /**
     * @return LengthAwarePaginator
     */
    public function getAssignments(): LengthAwarePaginator
    {
        return $this->assignments;
    }

    /**
     * @param LengthAwarePaginator $assignments
     * @return AssignmentListResponse
     */
    public function setAssignments(LengthAwarePaginator $assignments): AssignmentListResponse
    {
        $this->assignments = $assignments;
        return $this;
    }
}
