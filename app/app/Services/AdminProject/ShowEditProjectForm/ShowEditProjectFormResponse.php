<?php


namespace App\Services\AdminProject\ShowEditProjectForm;


use App\Models\Agent;
use App\Models\Position;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Station;
use Illuminate\Support\Collection;

class ShowEditProjectFormResponse
{
    /**
     * @var Project
     */
    private $project;

    /**
     * @var Agent[]|Collection
     */
    private $agents;

    /**
     * @var Skill[]|Collection
     */
    private $skills;

    /**
     * @var Position[]|Collection
     */
    private $positions;

    /**
     * @var Station[]|Collection
     */
    private $stations;

    /**
     * @return \Illuminate\Support\Collection ;
     */
    public function getAgents(): Collection
    {
        return $this->agents;
    }

    /**
     * @param \Illuminate\Support\Collection $agents
     * @return ShowEditProjectFormResponse
     */
    public function setAgents(Collection $agents): ShowEditProjectFormResponse
    {
        $this->agents = $agents;
        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    /**
     * @param \Illuminate\Support\Collection $skills
     * @return ShowEditProjectFormResponse
     */
    public function setSkills(Collection $skills): ShowEditProjectFormResponse
    {
        $this->skills = $skills;
        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getPositions(): Collection
    {
        return $this->positions;
    }

    /**
     * @param \Illuminate\Support\Collection $positions
     * @return ShowEditProjectFormResponse
     */
    public function setPositions(Collection $positions): ShowEditProjectFormResponse
    {
        $this->positions = $positions;
        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getStations(): Collection
    {
        return $this->stations;
    }

    /**
     * @param \Illuminate\Support\Collection $stations
     * @return ShowEditProjectFormResponse
     */
    public function setStations(Collection $stations): ShowEditProjectFormResponse
    {
        $this->stations = $stations;
        return $this;
    }

    /**
     * @return Project
     */
    public function getProject(): Project
    {
        return $this->project;
    }

    /**
     * @param Project $project
     * @return \App\Services\AdminProject\ShowEditProjectForm\ShowEditProjectFormResponse
     */
    public function setProject(Project $project): ShowEditProjectFormResponse
    {
        $this->project = $project;
        return $this;
    }

}
