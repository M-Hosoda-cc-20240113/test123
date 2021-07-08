<?php

namespace App\Services\AdminProject\ProjectList;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProjectListResponse
{
    /**
     * @var \Illuminate\Pagination\LengthAwarePaginator
     */
    private $projects;

    /**
     * @var Collection
     */
    private $skills;

    /**
     * @var Collection
     */
    private $positions;

    /**
     * @var Collection
     */
    private $stations;

    /**
     * @var Collection
     */
    private $areas;

    /**
     * @var int
     */
    private $count_position_skill;

    /**
     * @var int
     */
    private $project_counts;

    /**
     * @return LengthAwarePaginator
     */
    public function getProjects(): LengthAwarePaginator
    {
        return $this->projects;
    }

    /**
     * @param LengthAwarePaginator $projects
     * @return ProjectListResponse
     */
    public function setProjects(LengthAwarePaginator $projects): ProjectListResponse
    {
        $this->projects = $projects;
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
     * @return ProjectListResponse
     */
    public function setSkills(Collection $skills): ProjectListResponse
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
     * @return ProjectListResponse
     */
    public function setPositions(Collection $positions): ProjectListResponse
    {
        $this->positions = $positions;
        return $this;
    }

    /**
     * @return int
     */
    public function getCountPositionSkill(): int
    {
        return $this->count_position_skill;
    }

    /**
     * @param int $count_position_skill
     * @return ProjectListResponse
     */
    public function setCountPositionSkill(int $count_position_skill): ProjectListResponse
    {
        $this->count_position_skill = $count_position_skill;
        return $this;
    }

    /**
     * @return int
     */
    public function getProjectCounts(): int
    {
        return $this->project_counts;
    }

    /**
     * @param int $project_counts
     * @return ProjectListResponse
     */
    public function setProjectCounts(int $project_counts): ProjectListResponse
    {
        $this->project_counts = $project_counts;
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
     * @return ProjectListResponse
     */
    public function setStations(Collection $stations): ProjectListResponse
    {
        $this->stations = $stations;
        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAreas(): Collection
    {
        return $this->areas;
    }

    /**
     * @param \Illuminate\Support\Collection $areas
     * @return ProjectListResponse
     */
    public function setAreas(Collection $areas): ProjectListResponse
    {
        $this->areas = $areas;
        return $this;
    }
}
