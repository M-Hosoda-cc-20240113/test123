<?php

namespace App\Services\Top\FetchTopData;

use App\Models\Position;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Station;
use Illuminate\Support\Collection;

/**
 * Class FetchTopResponse
 * @package App\Services\Top\FetchTopData
 */
class FetchTopResponse
{
    /**
     * @var Project[]|Collection
     */
    private $projects;

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
     * Get the value of projects
     *
     * @return  Project[]|Collection
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    /**
     * Set the value of projects
     *
     * @param Collection $projects
     *
     * @return  self
     */
    public function setProjects(Collection $projects): FetchTopResponse
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     * Get the value of skills
     *
     * @return  Skill[]|Collection
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    /**
     * Set the value of skills
     *
     * @param Collection $skills
     *
     * @return  self
     */
    public function setSkills(Collection $skills): FetchTopResponse
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get the value of positions
     *
     * @return  Position[]|Collection
     */
    public function getPositions(): Collection
    {
        return $this->positions;
    }

    /**
     * Set the value of positions
     *
     * @param Collection $positions
     * @return  self
     */
    public function setPositions(Collection $positions): FetchTopResponse
    {
        $this->positions = $positions;

        return $this;
    }

    /**
     * Get the value of stations
     *
     * @return  Station[]|Collection
     */
    public function getStations(): Collection
    {
        return $this->stations;
    }

    /**
     * Set the value of stations
     *
     * @param Collection $stations
     *
     * @return  self
     */
    public function setStations(Collection $stations): FetchTopResponse
    {
        $this->stations = $stations;

        return $this;
    }
}
