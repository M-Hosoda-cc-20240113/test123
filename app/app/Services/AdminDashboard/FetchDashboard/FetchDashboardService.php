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
        $fetch_interview_user = $this->application_repository->fetchInterviewUser();
        $fetch_user_operation = $this->user_repository->fetchThisMonthOperation();
        $fetch_not_open_user = $this->status_repository->fetchNotOpenUser();
        $fetch_assign_new_user = $this->assignment_repository->fetchNewUser();
        $fetch_assign_user = $this->assignment_repository->fetchUser();

        $response->setFetchUserOperation($fetch_user_operation);
        $response->setFetchInterview($fetch_interview_user);
        $response->setFetchNotOpen($fetch_not_open_user);
        $response->setFetchNewAssignUser($fetch_assign_new_user);
        $response->setFetchAssignUser($fetch_assign_user);

        return $response;
    }
}
