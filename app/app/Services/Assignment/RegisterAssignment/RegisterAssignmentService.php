<?php


namespace App\Services\Assignment\RegisterAssignment;


use App\Models\Assignment;
use App\Services\Assignment\AssignmentRepositoryInterface;

class RegisterAssignmentService
{
    /**
     * @var AssignmentRepositoryInterface
     */
    private $assignment_repository;

    /**
     * AssignmentListService constructor.
     * @param \App\Services\Assignment\AssignmentRepositoryInterface $assignment_repository
     */
    public function __construct(
        AssignmentRepositoryInterface $assignment_repository
    ) {
        $this->assignment_repository = $assignment_repository;
    }

    /**
     * @param RegisterAssignmentParameter $parameter
     * @return Assignment
     */
    public function exec(RegisterAssignmentParameter $parameter): Assignment
    {
        return $this->assignment_repository->register($parameter);
    }
}
