<?php


namespace App\Services\AdminProject\ShowEditProjectForm;


use App\Services\Agent\AgentRepositoryInterface;
use App\Services\Position\PositionRepositoryInterface;
use App\Services\Project\ProjectRepositoryInterface;
use App\Services\Skill\SkillRepositoryInterface;
use App\Services\Station\StationRepositoryInterface;

class ShowEditProjectFormService
{
    private $project_repository;
    private $position_repository;
    private $skill_repository;
    private $station_repository;
    private $agent_repository;

    /**
     * ShowEditFormService constructor.
     * @param ProjectRepositoryInterface $project_repository
     * @param \App\Services\Position\PositionRepositoryInterface $position_repository
     * @param \App\Services\Skill\SkillRepositoryInterface $skill_repository
     * @param \App\Services\Station\StationRepositoryInterface $station_repository
     * @param \App\Services\Agent\AgentRepositoryInterface $agent_repository
     */
    public function __construct(
        ProjectRepositoryInterface $project_repository,
        PositionRepositoryInterface $position_repository,
        SkillRepositoryInterface $skill_repository,
        StationRepositoryInterface $station_repository,
        AgentRepositoryInterface $agent_repository
    ) {
        $this->project_repository = $project_repository;
        $this->position_repository = $position_repository;
        $this->skill_repository = $skill_repository;
        $this->station_repository = $station_repository;
        $this->agent_repository = $agent_repository;
    }

    /**
     * @param $project_id
     * @return \App\Services\AdminProject\ShowEditProjectForm\ShowEditProjectFormResponse
     */
    public function exec($project_id): ShowEditProjectFormResponse
    {
        $response = new ShowEditProjectFormResponse();
        $project = $this->project_repository->findWithUsersAndAgentThroughApplicationOrAssignment($project_id);
        $positions = $this->position_repository->all();
        $skills = $this->skill_repository->all();
        $stations = $this->station_repository->all();
        $agents = $this->agent_repository->all();

        $response->setProject($project);
        $response->setPositions($positions);
        $response->setSkills($skills);
        $response->setStations($stations);
        $response->setAgents($agents);

        return $response;
    }
}
