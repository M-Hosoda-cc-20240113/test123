<?php

namespace App\Services\Assignment;

use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
use App\Services\Assignment\DeleteAssignment\DeleteAssignmentParameter;
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
     * @return array
     */
    public function register(RegisterAssignmentParameter $parameter): array;

    /**
     * @param \App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter $parameter
     */
    public function updateAdmin(UpdateUserAdminParameter $parameter): void;

    /**
     * @param \App\Services\Assignment\DeleteAssignment\DeleteAssignmentParameter $parameter
     */
    public function delete(DeleteAssignmentParameter $parameter): void;

    /**
     * @return int
     */
    public function userCounts(): int;

    /**
     * @return int
     */
    public function newUserCounts(): int;
}
