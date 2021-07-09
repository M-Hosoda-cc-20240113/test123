<?php

namespace App\Services\AdminProject\ProjectList;

use App\Services\Area\AreaRepositoryInterface;
use App\Services\Level\LevelRepositoryInterface;
use App\Services\Pagination\PaginatorService;
use App\Services\Position\PositionRepositoryInterface;
use App\Services\Project\ProjectRepositoryInterface;
use App\Services\Skill\SkillRepositoryInterface;
use App\Services\Station\StationRepositoryInterface;

/**
 * Class ProjectListService
 * @package App\Services\AdminProject\ProjectList
 */
class ProjectListService
{
    /**
     * @var ProjectRepositoryInterface
     */
    private $project_repository;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * @var SkillRepositoryInterface
     */
    private $skill_repository;

    /**
     * @var PositionRepositoryInterface
     */
    private $position_repository;

    /**
     * @var StationRepositoryInterface
     */
    private $station_repository;

    /**
     * @var AreaRepositoryInterface
     */
    private $area_repository;

    /**
     * ProjectListService constructor.
     * @param \App\Services\Project\ProjectRepositoryInterface $project_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     * @param \App\Services\Skill\SkillRepositoryInterface $skill_repository
     * @param \App\Services\Position\PositionRepositoryInterface $position_repository
     * @param \App\Services\Station\StationRepositoryInterface $station_repository
     * @param \App\Services\Area\AreaRepositoryInterface $area_repository
     */
    public function __construct(
        ProjectRepositoryInterface $project_repository,
        PaginatorService $paginator_service,
        SkillRepositoryInterface $skill_repository,
        PositionRepositoryInterface $position_repository,
        StationRepositoryInterface $station_repository,
        AreaRepositoryInterface $area_repository
    ) {
        $this->project_repository = $project_repository;
        $this->paginator_service = $paginator_service;
        $this->skill_repository = $skill_repository;
        $this->position_repository = $position_repository;
        $this->station_repository = $station_repository;
        $this->area_repository = $area_repository;
    }

    /**
     * @return \App\Services\AdminProject\ProjectList\ProjectListResponse
     */
    public function exec(): ProjectListResponse
    {
        $projects = $this->project_repository->all();
        $skills = $this->skill_repository->all();
        $positions = $this->position_repository->all();
        $stations = $this->station_repository->all();
        $areas = $this->area_repository->all();
        $response = new ProjectListResponse();
        $response->setCountPositionSkill(0);
        $response->setSkills($skills);
        $response->setPositions($positions);
        $response->setStations($stations);
        $response->setAreas($areas);
        $response->setProjects($this->paginator_service->paginate($projects));
        $response->setProjectCounts($projects->count());
        return $response;
    }
}
