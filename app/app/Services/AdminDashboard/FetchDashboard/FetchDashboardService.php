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
        $fetch_assign_user_fin = $this->user_repository->fetchFinProjectUserOfThisMonth($today);

        $response->setUsersByOperationMonth($fetch_user_operation);
        $response->setUsersByInterviewMonth($fetch_interview_user);
        $response->setInterviewedUsers($fetch_interviewed_user);
        $response->setNotOpenUsers($fetch_not_open_user);
        $response->setNewAssignUsers($fetch_assign_new_user);
        $response->setAssignUsers($fetch_assign_user);
        $response->setAssignFinUsers($fetch_assign_user_fin);

        return $response;
    }
}
