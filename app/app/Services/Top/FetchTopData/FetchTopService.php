<?php

namespace App\Services\Top\FetchTopData;

use App\Services\Project\ProjectRepositoryInterface;
use App\Services\Skill\SkillRepositoryInterface;
use App\Services\Position\PositionRepositoryInterface;
use App\Services\Station\StationRepositoryInterface;
use App\Services\Top\FetchTopData\FetchTopResponse;

class FetchTopService
{
  /**
   * @var ProjectRepositoryInterface
   * @var SkillRepositoryInterface
   * @var PositionRepositoryInterface
   * @var StationRepositoryInterface
   */

  private $project_repository;
  private $skill_repository;
  private $position_repository;
  private $station_repository;

  public function __construct(
    ProjectRepositoryInterface $project_repository,
    SkillRepositoryInterface $skill_repository,
    PositionRepositoryInterface $position_repository,
    StationRepositoryInterface $station_repository
  ) {
    $this->project_repository = $project_repository;
    $this->skill_repository = $skill_repository;
    $this->position_repository = $position_repository;
    $this->station_repository = $station_repository;
  }

  public function exec(): \App\Services\Top\FetchTopData\FetchTopResponse
  {
    $response = new FetchTopResponse();
    $projects = $this->project_repository->all();
    $response->setProjects($projects);
    $skills = $this->skill_repository->all();
    $response->setSkills($skills);
    $positions = $this->position_repository->all();
    $response->setPositions($positions);
    $stations = $this->station_repository->all();
    $response->setStations($stations);
    return $response;
  }
}
