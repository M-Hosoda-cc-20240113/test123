<?php


namespace App\Services\AdminUser\UpdateUser;


class UpdateUserAdminParameter
{
    /**
     * @var int
     */
    private $user_id;

    /**
     * @var int[]|array
     */
    private $project_status_ids;

    /**
     * @var int[]|array
     */
    private $project_interview_ids;

    /**
     * @var int
     */
    private $project_assign_id;

    /**
     * @var int[]|array
     */
    private $statuses;

    /**
     * @var string
     */
    private $operation_start_month;

    /**
     * @var string|array
     */
    private $interview_date;

    /**
     * @var string|array
     */
    private $assignment_start_date;

    /**
     * @var string|array
     */
    private $assignment_end_date;

    /**
     * @var string
     */
    private $remarks;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return UpdateUserAdminParameter
     */
    public function setUserId(int $user_id): UpdateUserAdminParameter
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getProjectStatusIds(): ?array
    {
        return $this->project_status_ids;
    }

    /**
     * @param array|int[] $project_status_ids
     * @return UpdateUserAdminParameter
     */
    public function setProjectStatusIds(?array $project_status_ids): UpdateUserAdminParameter
    {
        $this->project_status_ids = $project_status_ids;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getProjectInterviewIds(): ?array
    {
        return $this->project_interview_ids;
    }

    /**
     * @param array|null $project_interview_ids
     * @return UpdateUserAdminParameter
     */
    public function setProjectInterviewIds(?array $project_interview_ids): UpdateUserAdminParameter
    {
        $this->project_interview_ids = $project_interview_ids;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getProjectAssignId(): ?int
    {
        return $this->project_assign_id;
    }

    /**
     * @param int|null $project_assign_id
     * @return UpdateUserAdminParameter
     */
    public function setProjectAssignId(?int $project_assign_id): UpdateUserAdminParameter
    {
        $this->project_assign_id = $project_assign_id;
        return $this;
    }


    /**
     * @return array|null
     */
    public function getStatuses(): ?array
    {
        return $this->statuses;
    }

    /**
     * @param array|null $statuses
     * @return UpdateUserAdminParameter
     */
    public function setStatuses(?array $statuses): UpdateUserAdminParameter
    {
        $this->statuses = $statuses;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOperationStartMonth(): ?string
    {
        return $this->operation_start_month;
    }

    /**
     * @param string|null $operation_start_month
     * @return UpdateUserAdminParameter
     */
    public function setOperationStartMonth(?string $operation_start_month): UpdateUserAdminParameter
    {
        $this->operation_start_month = $operation_start_month;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getInterviewDate(): ?array
    {
        return $this->interview_date;
    }

    /**
     * @param array|null $interview_date
     * @return UpdateUserAdminParameter
     */
    public function setInterviewDate(?array $interview_date): UpdateUserAdminParameter
    {
        $this->interview_date = $interview_date;
        return $this;
    }

    /**
     * @return string
     */
    public function getAssignmentStartDate()
    {
        return $this->assignment_start_date;
    }

    /**
     * @param string|null $assignment_start_date
     * @return UpdateUserAdminParameter
     */
    public function setAssignmentStartDate(?string $assignment_start_date): UpdateUserAdminParameter
    {
        $this->assignment_start_date = $assignment_start_date;
        return $this;
    }

    /**
     * @return string
     */
    public function getAssignmentEndDate()
    {
        return $this->assignment_end_date;
    }

    /**
     * @param string|null $assignment_end_date
     * @return UpdateUserAdminParameter
     */
    public function setAssignmentEndDate(?string $assignment_end_date): UpdateUserAdminParameter
    {
        $this->assignment_end_date = $assignment_end_date;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    /**
     * @param string|null $remarks
     * @return UpdateUserAdminParameter
     */
    public function setRemarks(?string $remarks): UpdateUserAdminParameter
    {
        $this->remarks = $remarks;
        return $this;
    }


}
