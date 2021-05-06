<?php


namespace App\Services\AdminDashboard\FetchDashboard;


use App\Services\Application\ApplicationRepositoryInterface;
use App\Services\Assignment\AssignmentRepositoryInterface;
use App\Services\Status\StatusRepositoryInterface;
use App\Services\User\UserRepositoryInterface;

/**
 * Class FetchDashboardService
 * @package App\Services\AdminDashboard\FetchDashboard
 */
class FetchDashboardService
{
    /**
     * @var \App\Services\User\UserRepositoryInterface
     */
    private $user_repository;

    /**
     * @var ApplicationRepositoryInterface
     */
    private $application_repository;

    /**
     * @var StatusRepositoryInterface
     */
    private $status_repository;

    /**
     * @var AssignmentRepositoryInterface
     */
    private $assignment_repository;

    /**
     * FetchDashboardResponse constructor.
     * @param UserRepositoryInterface $user_repository
     * @param ApplicationRepositoryInterface $application_repository
     * @param StatusRepositoryInterface $status_repository
     * @param AssignmentRepositoryInterface $assignment_repository
     */
    public function __construct(
        UserRepositoryInterface $user_repository,
        ApplicationRepositoryInterface $application_repository,
        StatusRepositoryInterface $status_repository,
        AssignmentRepositoryInterface $assignment_repository)
    {
        $this->user_repository = $user_repository;
        $this->application_repository = $application_repository;
        $this->status_repository = $status_repository;
        $this->assignment_repository = $assignment_repository;
    }

    /**
     * @return FetchDashboardResponse
     */
    public function exec(): FetchDashboardResponse
    {
        $response = new FetchDashboardResponse;
        $interview_counts = $this->application_repository->interviewUserCounts();
        $user_operation_counts = $this->user_repository->thisMonthOperationCounts();
        $not_open_counts = $this->status_repository->notOpenUserCounts();
        $assign_new_counts = $this->assignment_repository->newUserCounts();
        $assign_counts = $this->assignment_repository->userCounts();

        $response->setUserOperationCounts($user_operation_counts);
        $response->setInterviewCounts($interview_counts);
        $response->setNotOpenCounts($not_open_counts);
        $response->setNewAssignCounts($assign_new_counts);
        $response->setAssignCounts($assign_counts);

        return $response;
    }
}
