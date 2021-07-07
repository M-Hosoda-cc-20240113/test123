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
     * @var int
     */
    private $count_level_skill;

    /**
     * @var int
     */
    private $projects_counts;

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
    public function getCountLevelSkill(): int
    {
        return $this->count_level_skill;
    }

    /**
     * @param int $count_level_skill
     * @return ProjectListResponse
     */
    public function setCountLevelSkill(int $count_level_skill): ProjectListResponse
    {
        $this->count_level_skill = $count_level_skill;
        return $this;
    }

    /**
     * @return int
     */
    public function getProjectsCounts(): int
    {
        return $this->projects_counts;
    }

    /**
     * @param int $projects_counts
     * @return ProjectListResponse
     */
    public function setProjectsCounts(int $projects_counts): ProjectListResponse
    {
        $this->projects_counts = $projects_counts;
        return $this;
    }
}
