<?php


namespace App\Services\AdminDashboard\FetchDashboard;

use App\Services\User\UserRepositoryInterface;
use Carbon\CarbonImmutable;

/**
 * Class FetchDashboardService
 * @package App\Services\AdminDashboard\FetchDashboard
 */
class FetchDashboardService
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;

    /**
     * FetchDashboardService constructor.
     * @param UserRepositoryInterface $user_repository
     */
    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    /**
     * @return FetchDashboardResponse
     */
    public function exec(): FetchDashboardResponse
    {
        $today = CarbonImmutable::today();
        $response = new FetchDashboardResponse;
        $fetch_interview_user = $this->user_repository->fetchByInterviewMonth($today);
        $fetch_interviewed_user = $this->user_repository->fetchByInterviewMonthAndStatus($today, 2);
        $fetch_user_operation = $this->user_repository->fetchByOperationStartMonth($today);
        $fetch_not_open_user = $this->user_repository->fetchByOperationStartMonthAndStatus($today, 0);
        $fetch_assign_new_user = $this->user_repository->fetchNewUserOfThisMonth($today);
        $fetch_assign_user = $this->user_repository->fetchNotNewUserOfThisMonth($today);

        $response->setFetchUserOperation($fetch_user_operation);
        $response->setFetchInterview($fetch_interview_user);
        $response->setFetchInterviewed($fetch_interviewed_user);
        $response->setFetchNotOpen($fetch_not_open_user);
        $response->setFetchNewAssignUser($fetch_assign_new_user);
        $response->setFetchAssignUser($fetch_assign_user);

        return $response;
    }
}
