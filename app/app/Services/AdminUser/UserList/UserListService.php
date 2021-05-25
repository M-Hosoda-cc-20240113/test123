<?php

namespace App\Services\AdminUser\UserList;

use App\Services\Level\LevelRepositoryInterface;
use App\Services\Pagination\PaginatorService;
use App\Services\Skill\SkillRepositoryInterface;
use App\Services\User\UserRepositoryInterface;

/**
 * Class UserListService
 * @package App\Services\AdminUser\UserList
 */
class UserListService
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * @var SkillRepositoryInterface
     */
    private $skill_repository;

    /**
     * @var LevelRepositoryInterface
     */
    private $level_repository;

    /**
     * UserListService constructor.
     * @param \App\Services\User\UserRepositoryInterface $user_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     * @param \App\Services\Skill\SkillRepositoryInterface $skill_repository
     * @param \App\Services\Level\LevelRepositoryInterface $level_repository
     */
    public function __construct(
        UserRepositoryInterface $user_repository,
        PaginatorService $paginator_service,
        SkillRepositoryInterface $skill_repository,
        LevelRepositoryInterface $level_repository
    ) {
        $this->user_repository = $user_repository;
        $this->paginator_service = $paginator_service;
        $this->skill_repository = $skill_repository;
        $this->level_repository = $level_repository;
    }

    /**
     * @return \App\Services\AdminUser\UserList\UserListResponse
     */
    public function exec(): UserListResponse
    {
        $users = $this->user_repository->all();
        $skills = $this->skill_repository->all();
        $levels = $this->level_repository->all();
        $response = new UserListResponse();
        $response->setCountLevelSkill(0);
        $response->setSkills($skills);
        $response->setLevels($levels);
        $response->setUsers($this->paginator_service->paginate($users));
        $response->setUserCounts($users->count());
        return $response;
    }
}
