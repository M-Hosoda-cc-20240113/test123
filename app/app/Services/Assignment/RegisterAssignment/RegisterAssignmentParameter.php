<?php


namespace App\Services\Assignment\RegisterAssignment;


class RegisterAssignmentParameter
{
    /**
     * @var int[]
     */
    private $user_id;

    /**
     * @var int[]
     */
    private $project_id;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return RegisterAssignmentParameter
     */
    public function setUserId(int $user_id): RegisterAssignmentParameter
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->project_id;
    }

    /**
     * @param int $project_id
     * @return RegisterAssignmentParameter
     */
    public function setProjectId(int $project_id): RegisterAssignmentParameter
    {
        $this->project_id = $project_id;
        return $this;
    }

}
