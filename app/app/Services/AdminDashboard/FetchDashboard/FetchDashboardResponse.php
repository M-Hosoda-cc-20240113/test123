<?php


namespace App\Services\AdminDashboard\FetchDashboard;


use App\Services\Application\ApplicationRepositoryInterface;
use App\Services\Assignment\AssignmentRepositoryInterface;
use App\Services\Status\StatusRepositoryInterface;

class FetchDashboardResponse
{
    /**
     * @var int|null
     */
    private $user_operation_counts;

    /**
     * @var int|null
     */
    private $interview_counts;

    /**
     * @var int|null
     */
    private $not_open_counts;

    /**
     * @var int|null
     */
    private $assign_counts;

    /**
     * @return int|null
     */
    public function getUserOperationCounts(): ?int
    {
        return $this->user_operation_counts;
    }

    /**
     * @param int|null $user_operation_counts
     * @return FetchDashboardResponse
     */
    public function setUserOperationCounts(?int $user_operation_counts): FetchDashboardResponse
    {
        $this->user_operation_counts = $user_operation_counts;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getInterviewCounts(): ?int
    {
        return $this->interview_counts;
    }

    /**
     * @param int|null $interview_counts
     * @return FetchDashboardResponse
     */
    public function setInterviewCounts(?int $interview_counts): FetchDashboardResponse
    {
        $this->interview_counts = $interview_counts;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNotOpenCounts(): ?int
    {
        return $this->not_open_counts;
    }

    /**
     * @param int|null $not_open_counts
     * @return FetchDashboardResponse
     */
    public function setNotOpenCounts(?int $not_open_counts): FetchDashboardResponse
    {
        $this->not_open_counts = $not_open_counts;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAssignCounts(): ?int
    {
        return $this->assign_counts;
    }

    /**
     * @param int|null $assign_counts
     * @return FetchDashboardResponse
     */
    public function setAssignCounts(?int $assign_counts): FetchDashboardResponse
    {
        $this->assign_counts = $assign_counts;
        return $this;
    }

}
