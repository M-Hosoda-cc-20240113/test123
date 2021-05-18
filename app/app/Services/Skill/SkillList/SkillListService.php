<?php

namespace App\Services\Skill\SkillList;

use App\Services\Pagination\PaginatorService;
use App\Services\Skill\SkillRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class SkillListService
 * @package App\Services\Skill\SkillList
 */
class SkillListService
{
    /**
     * @var SkillRepositoryInterface
     */
    private $skill_repository;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * SkillListService constructor.
     * @param \App\Services\Skill\SkillRepositoryInterface $skill_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     */
    public function __construct(SkillRepositoryInterface $skill_repository, PaginatorService $paginator_service)
    {
        $this->skill_repository = $skill_repository;
        $this->paginator_service = $paginator_service;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function exec(): LengthAwarePaginator
    {
        $skills = $this->skill_repository->all();
        return $this->paginator_service->paginate($skills);
    }
}
