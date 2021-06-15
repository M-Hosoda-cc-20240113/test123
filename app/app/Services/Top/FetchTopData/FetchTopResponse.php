<?php

namespace App\Services\Top\FetchTopData;

use App\Models\Area;
use App\Models\Position;
use App\Models\Skill;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Class FetchTopResponse
 * @package App\Services\Top\FetchTopData
 */
class FetchTopResponse
{
    /**
     * @var LengthAwarePaginator
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
     * @var Area[]|Collection
     */
    private $areas;

    /**
     * @var int[]|array
     */
    private $searched_skill_ids;

    /**
     * @var int[]|array
     */
    private $searched_position_ids;

    /**
     * @var int[]|array
     */
    private $searched_area_ids;

    /**
     * @var int
     */
    private $project_counts;

    /**
     * Get the value of projects
     *
     * @return LengthAwarePaginator
     */
    public function getProjects(): LengthAwarePaginator
    {
        return $this->projects;
    }

    /**
     * Set the value of projects
     * @param LengthAwarePaginator $projects
     * @return FetchTopResponse
     */
    public function setProjects(LengthAwarePaginator $projects): FetchTopResponse
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
     * @return Area[]|Collection
     */
    public function getAreas()
    {
        return $this->areas;
    }

    /**
     * @param Area[]|Collection $areas
     * @return FetchTopResponse
     */
    public function setAreas($areas): FetchTopResponse
    {
        $this->areas = $areas;
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
     * @return FetchTopResponse
     */
    public function setSearchedSkillIds(array $searched_skill_ids): FetchTopResponse
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
     * @return FetchTopResponse
     */
    public function setSearchedPositionIds(array $searched_position_ids): FetchTopResponse
    {
        $this->searched_position_ids = $searched_position_ids;
        return $this;
    }

    /**
     * @return array|int[]
     */
    public function getSearchedAreaIds(): array
    {
        return $this->searched_area_ids;
    }

    /**
     * @param array|int[] $searched_area_ids
     * @return FetchTopResponse
     */
    public function setSearchedAreaIds(array $searched_area_ids): FetchTopResponse
    {
        $this->searched_area_ids = $searched_area_ids;
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
     * @return FetchTopResponse
     */
    public function setProjectCounts(int $project_counts): FetchTopResponse
    {
        $this->project_counts = $project_counts;
        return $this;
    }
}
