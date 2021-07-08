<?php


namespace App\Services\AdminProject\SearchProject;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchProjectResponse
{
    /**
     * @var LengthAwarePaginator
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
    private $count_Position_skill;

    /**
     * @var int[]|array
     */
    private $searched_skill_ids;

    /**
     * @var int[]|array
     */
    private $searched_position_ids;

    /**
     * @var int
     */
    private $project_counts;

    /**
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getProjects(): LengthAwarePaginator
    {
        return $this->projects;
    }

    /**
     * @param \Illuminate\Pagination\LengthAwarePaginator $projects
     * @return SearchProjectResponse
     */
    public function setProjects(LengthAwarePaginator $projects): SearchProjectResponse
    {
        $this->projects = $projects;
        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection $skills
     * @return SearchProjectResponse
     */
    public function setSkills(Collection $skills): SearchProjectResponse
    {
        $this->skills = $skills;
        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPositions(): Collection
    {
        return $this->positions;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection $positions
     * @return SearchProjectResponse
     */
    public function setPositions(Collection $positions): SearchProjectResponse
    {
        $this->positions = $positions;
        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getStations(): Collection
    {
        return $this->stations;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection $stations
     * @return SearchProjectResponse
     */
    public function setStations(Collection $stations): SearchProjectResponse
    {
        $this->stations = $stations;
        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAreas(): Collection
    {
        return $this->areas;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection $areas
     * @return SearchProjectResponse
     */
    public function setAreas(Collection $areas): SearchProjectResponse
    {
        $this->areas = $areas;
        return $this;
    }

    /**
     * @return int
     */
    public function getCountPositionSkill(): int
    {
        return $this->count_Position_skill;
    }

    /**
     * @param int $count_Position_skill
     * @return SearchProjectResponse
     */
    public function setCountPositionSkill(int $count_Position_skill): SearchProjectResponse
    {
        $this->count_Position_skill = $count_Position_skill;
        return $this;
    }

    /**
     * @return array|int[]
     */
    public function getSearchedSkillIds(): array
    {
        return $this->searched_skill_ids;
    }

    /**
     * @param array|int[] $searched_skill_ids
     * @return SearchProjectResponse
     */
    public function setSearchedSkillIds(array $searched_skill_ids): SearchProjectResponse
    {
        $this->searched_skill_ids = $searched_skill_ids;
        return $this;
    }

    /**
     * @return array|int[]
     */
    public function getSearchedPositionIds(): array
    {
        return $this->searched_position_ids;
    }

    /**
     * @param array|int[] $searched_position_ids
     * @return SearchProjectResponse
     */
    public function setSearchedPositionIds(array $searched_position_ids): SearchProjectResponse
    {
        $this->searched_position_ids = $searched_position_ids;
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
     * @return SearchProjectResponse
     */
    public function setProjectCounts(int $project_counts): SearchProjectResponse
    {
        $this->project_counts = $project_counts;
        return $this;
    }
}
