<?php


namespace App\Services\AdminUser\UpdateUser;


use App\Models\User;
use App\Services\Application\ApplicationRepositoryInterface;
use App\Services\Assignment\AssignmentRepositoryInterface;
use App\Services\Station\StationRepositoryInterface;
use App\Services\Status\StatusRepositoryInterface;
use App\Services\User\UserRepositoryInterface;

/**
 * Class UpdateUserService
 * @package App\Services\AdminUser\UpdateUser
 */
class UpdateUserService
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;

    /**
     * @var ApplicationRepositoryInterface
     */
    private $application_repository;

    /**
     * @var AssignmentRepositoryInterface
     */
    private $assignment_repository;

    /**
     * @var StatusRepositoryInterface
     */
    private $status_repository;

    /**
     * UpdateUserService constructor.
     * @param UserRepositoryInterface $user_repository
     * @param ApplicationRepositoryInterface $application_repository
     * @param AssignmentRepositoryInterface $assignment_repository
     * @param StatusRepositoryInterface $status_repository
     */
    public function __construct(
        UserRepositoryInterface $user_repository,
        ApplicationRepositoryInterface $application_repository,
        AssignmentRepositoryInterface $assignment_repository,
        StatusRepositoryInterface $status_repository
    ) {
        $this->user_repository = $user_repository;
        $this->application_repository = $application_repository;
        $this->assignment_repository = $assignment_repository;
        $this->status_repository = $status_repository;
    }


    /**
     * @param \App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter $parameter
     * @return \App\Models\User
     */
    public function exec(UpdateUserAdminParameter $parameter): User
    {
        $user = $this->user_repository->updateAdmin($parameter);
        $this->application_repository->updateAdmin($parameter);
        $this->assignment_repository->updateAdmin($parameter);
        $this->status_repository->updateAdmin($parameter);
        return $user;
    }
}
