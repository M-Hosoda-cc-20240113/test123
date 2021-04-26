<?php


namespace App\Services\AdminProject\EditProject;


use App\Models\Project;
use App\Models\Agent;
use App\Models\Skill;
use App\Models\Position;
use App\Models\Station;
use Illuminate\Support\Collection;

class ShowEditFormResponse
{
    /**
     * @var Project
     */
    private $project;

    /**
     * @var
     */
    private $agents;

    /**
     * @var
     */
    private $skills;

    /**
     * @var
     */
    private $positions;

    /**
     * @var
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
     * @return ShowEditFormResponse
     */
    public function setAgents(Collection $agents): ShowEditFormResponse
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
     * @return ShowEditFormResponse
     */
    public function setSkills(Collection $skills): ShowEditFormResponse
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
     * @return ShowEditFormResponse
     */
    public function setPositions(Collection $positions): ShowEditFormResponse
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
     * @return ShowEditFormResponse
     */
    public function setStations(Collection $stations): ShowEditFormResponse
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
     * @return \App\Services\AdminProject\EditProject\ShowEditFormResponse
     */
    public function setProject(Project $project): ShowEditFormResponse
    {
        $this->project = $project;
        return $this;
    }

}
