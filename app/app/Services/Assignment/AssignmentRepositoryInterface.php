<?php

namespace App\Services\Assignment;

use App\Models\Assignment;
use App\Services\Assignment\RegisterAssignment\RegisterAssignmentParameter;
use Illuminate\Database\Eloquent\Collection;

interface AssignmentRepositoryInterface
{
    /**
     * 稼働案件状況
     * @return Collection
     */
   public function all(): Collection;

    /**
     * @param \App\Services\Assignment\RegisterAssignment\RegisterAssignmentParameter $parameter
     * @return Assignment
     */
    public function register(RegisterAssignmentParameter $parameter): Assignment;
}
