<?php


namespace App\Services\AdminProject\ShowCreateProjectForm;


use App\Services\Agent\AgentRepositoryInterface;
use App\Services\Position\PositionRepositoryInterface;
use App\Services\Skill\SkillRepositoryInterface;
use App\Services\Station\StationRepositoryInterface;

class ShowCreateProjectFormService
{
    /**
     * @var
     */
    private $position_repository;
    private $skill_repository;
    private $station_repository;
    private $agent_repository;

    /**
     * ShowCreateProjectFormService constructor.
     * @param $position_repository
     * @param $skill_repository
     * @param $station_repository
     * @param $agent_repository
     */
    public function __construct(
        PositionRepositoryInterface $position_repository,
        SkillRepositoryInterface $skill_repository,
        StationRepositoryInterface $station_repository,
        AgentRepositoryInterface $agent_repository
    ) {
        $this->position_repository = $position_repository;
        $this->skill_repository = $skill_repository;
        $this->station_repository = $station_repository;
        $this->agent_repository = $agent_repository;
    }

    public function exec()
    {
        $response = new ShowCreateProjectFormResponse();

        $positions = $this->position_repository->all();
        $skills = $this->skill_repository->all();
        $stations = $this->station_repository->all();
        $agents = $this->agent_repository->all();

        $response->setPositions($positions);
        $response->setSkills($skills);
        $response->setStations($stations);
        $response->setAgents($agents);

        return $response;
    }

}
