<?php


namespace App\Services\AdminUser\UserStatus;


use App\Services\Application\ApplicationRepositoryInterface;
use App\Services\Assignment\AssignmentRepositoryInterface;
use App\Services\Pagination\PaginatorService;
use App\Services\Status\StatusRepositoryInterface;
use App\Services\User\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class UserStatusService
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
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * UserStatusService constructor.
     * @param \App\Services\User\UserRepositoryInterface $user_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     */
    public function __construct(
        UserRepositoryInterface $user_repository,
        PaginatorService $paginator_service
    ) {
        $this->user_repository = $user_repository;
        $this->paginator_service = $paginator_service;
    }


    /**
     * @param $status
     * @return \App\Models\User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function exec($status): LengthAwarePaginator
    {
        $today = Carbon::today();
        switch ($status) {
            case 1:
                $users = $this->user_repository->fetchByOperationStartMonth($today);
                break;
            //未営業
            case 2:
                $users = $this->user_repository->fetchNotOpenUserOfThisMonth();
                break;
            //新規稼働
            case 3:
                $users = $this->user_repository->fetchNewUserOfThisMonth();
                break;
            //既存稼働
            case 4:
                $users = $this->user_repository->fetchByNotNewUserOfThisMonth();
                break;
            //今月面談
            case 5:
                $users = $this->user_repository->fetchInterviewUserOfThisMonth();
                break;
            default:
                $users = $this->user_repository->all();
        }
        return $this->paginator_service->paginate($users);
    }
}
