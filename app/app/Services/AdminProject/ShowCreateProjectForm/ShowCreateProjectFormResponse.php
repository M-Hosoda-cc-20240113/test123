<?php


namespace App\Services\AdminProject\ShowCreateProjectForm;


class ShowCreateProjectFormResponse
{
    /**
     * @var
     */
    private $positions;
    private $skills;
    private $stations;
    private $agents;

    /**
     * @return mixed
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @param $positions
     * @return \App\Services\AdminProject\ShowCreateProjectForm\ShowCreateProjectFormResponse
     */
    public function setPositions($positions): ShowCreateProjectFormResponse
    {
        $this->positions = $positions;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param mixed $skills
     */
    public function setSkills($skills): ShowCreateProjectFormResponse
    {
        $this->skills = $skills;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStations()
    {
        return $this->stations;
    }

    /**
     * @param mixed $stations
     */
    public function setStations($stations): ShowCreateProjectFormResponse
    {
        $this->stations = $stations;
        return $this;
    }

    /**
     * @return
     */
    public function getAgents()
    {
        return $this->agents;
    }

    /**
     * @param  $agents
     * @return \App\Services\AdminProject\ShowCreateProjectForm\ShowCreateProjectFormResponse
     */
    public function setAgents($agents): ShowCreateProjectFormResponse
    {
        $this->agents = $agents;
        return $this;
    }

}
