<?php

namespace App\Services\Top\FetchTopData;

use App\Services\Area\AreaRepositoryInterface;
use App\Services\Pagination\PaginatorService;
use App\Services\Project\ProjectRepositoryInterface;
use App\Services\Skill\SkillRepositoryInterface;
use App\Services\Position\PositionRepositoryInterface;

class FetchTopService
{
    /**
     * @var ProjectRepositoryInterface
     * @var SkillRepositoryInterface
     * @var PositionRepositoryInterface
     * @var AreaRepositoryInterface
     * @var PaginatorService
     */

    private $project_repository;
    private $skill_repository;
    private $position_repository;
    private $area_repository;
    private $paginator_service;

    /**
     * FetchTopService constructor.
     * @param \App\Services\Project\ProjectRepositoryInterface $project_repository
     * @param \App\Services\Skill\SkillRepositoryInterface $skill_repository
     * @param \App\Services\Position\PositionRepositoryInterface $position_repository
     * @param \App\Services\Area\AreaRepositoryInterface $area_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     */
    public function __construct(
        ProjectRepositoryInterface $project_repository,
        SkillRepositoryInterface $skill_repository,
        PositionRepositoryInterface $position_repository,
        AreaRepositoryInterface $area_repository,
        PaginatorService $paginator_service
    ) {
        $this->project_repository = $project_repository;
        $this->skill_repository = $skill_repository;
        $this->position_repository = $position_repository;
        $this->area_repository = $area_repository;
        $this->paginator_service = $paginator_service;
    }

    /**
     * @return FetchTopResponse
     */
    public function exec(): FetchTopResponse
    {
        $response = new FetchTopResponse();
        $projects = $this->project_repository->fetchCanApply();
        $response->setProjects($this->paginator_service->paginate($projects, 6));
        $response->setProjectCounts($projects->count());
        $skills = $this->skill_repository->all();
        $response->setSkills($skills);
        $positions = $this->position_repository->all();
        $response->setPositions($positions);
        $areas = $this->area_repository->all();
        $response->setAreas($areas);
        return $response;
    }
}
