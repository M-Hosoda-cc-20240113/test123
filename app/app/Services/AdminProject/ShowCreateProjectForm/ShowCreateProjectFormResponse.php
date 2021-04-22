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
     * @param mixed $positions
     */
    public function setPositions($positions)
    {
        $this->positions = $positions;
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
    public function setSkills($skills)
    {
        $this->skills = $skills;
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
    public function setStations($stations)
    {
        $this->stations = $stations;
    }

    /**
     * @return mixed
     */
    public function getAgents()
    {
        return $this->agents;
    }

    /**
     * @param mixed $agents
     */
    public function setAgents($agents)
    {
        $this->agents = $agents;
    }

}
