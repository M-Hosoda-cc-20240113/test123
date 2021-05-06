<?php


namespace App\Services\Assignment\DeleteAssignment;

use App\Services\Assignment\AssignmentRepositoryInterface;

/**
 * Class DeleteAssignmentService
 * @package App\Services\Assignment\DeleteAssignment
 */
class DeleteAssignmentService
{
    /**
     * @var AssignmentRepositoryInterface
     */
    private $assignment_repository;

    /**
     * DeleteAssignmentService constructor.
     * @param AssignmentRepositoryInterface $assignment_repository
     */
    public function __construct(AssignmentRepositoryInterface $assignment_repository)
    {
        $this->assignment_repository = $assignment_repository;
    }

    /**
     * @param DeleteAssignmentParameter $parameter
     */
    public function exec(DeleteAssignmentParameter $parameter)
    {
        $this->assignment_repository->delete($parameter);
    }
}
