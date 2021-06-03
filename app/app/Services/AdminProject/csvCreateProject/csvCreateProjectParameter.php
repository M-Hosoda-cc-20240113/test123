<?php


namespace App\Services\AdminProject\csvCreateProject;


class csvCreateProjectParameter
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int|null
     */
    private $agent_id;

    /**
     * @var int|null
     */
    private $station_id;

    /**
     * @var int|null
     */
    private $min_unit_price;

    /**
     * @var int
     */
    private $max_unit_price;

    /**
     * @var int|null
     */
    private $min_operation_time;

    /**
     * @var int
     */
    private $max_operation_time;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string|null
     */
    private $required_condition;

    /**
     * @var string|null
     */
    private $better_condition;

    /**
     * @var string|null
     */
    private $work_start;

    /**
     * @var string|null
     */
    private $work_end;

    /**
     * @var int|null
     */
    private $weekly_attendance;

    /**
     * @var string|null
     */
    private $feature;

    /**
     * @var int[]|array
     */
    private $skill_ids;

    /**
     * @var int[]|array
     */
    private $position_ids;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return csvCreateProjectParameter
     */
    public function setName(string $name): csvCreateProjectParameter
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAgentId(): ?int
    {
        return $this->agent_id;
    }

    /**
     * @param int|null $agent_id
     * @return csvCreateProjectParameter
     */
    public function setAgentId(?int $agent_id): csvCreateProjectParameter
    {
        $this->agent_id = $agent_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getStationId(): ?int
    {
        return $this->station_id;
    }

    /**
     * @param int|null $station_id
     * @return csvCreateProjectParameter
     */
    public function setStationId(?int $station_id): csvCreateProjectParameter
    {
        $this->station_id = $station_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinUnitPrice(): ?int
    {
        return $this->min_unit_price;
    }

    /**
     * @param int|null $min_unit_price
     * @return csvCreateProjectParameter
     */
    public function setMinUnitPrice(?int $min_unit_price): csvCreateProjectParameter
    {
        $this->min_unit_price = $min_unit_price;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxUnitPrice(): int
    {
        return $this->max_unit_price;
    }

    /**
     * @param int|null $max_unit_price
     * @return csvCreateProjectParameter
     */
    public function setMaxUnitPrice(?int $max_unit_price): csvCreateProjectParameter
    {
        $this->max_unit_price = $max_unit_price;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinOperationTime(): ?int
    {
        return $this->min_operation_time;
    }

    /**
     * @param int|null $min_operation_time
     * @return csvCreateProjectParameter
     */
    public function setMinOperationTime(?int $min_operation_time): csvCreateProjectParameter
    {
        $this->min_operation_time = $min_operation_time;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxOperationTime(): int
    {
        return $this->max_operation_time;
    }

    /**
     * @param int $max_operation_time
     * @return csvCreateProjectParameter
     */
    public function setMaxOperationTime(int $max_operation_time): csvCreateProjectParameter
    {
        $this->max_operation_time = $max_operation_time;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return csvCreateProjectParameter
     */
    public function setDescription(string $description): csvCreateProjectParameter
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRequiredCondition(): ?string
    {
        return $this->required_condition;
    }

    /**
     * @param string|null $required_condition
     * @return csvCreateProjectParameter
     */
    public function setRequiredCondition(?string $required_condition): csvCreateProjectParameter
    {
        $this->required_condition = $required_condition;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBetterCondition(): ?string
    {
        return $this->better_condition;
    }

    /**
     * @param string|null $better_condition
     * @return csvCreateProjectParameter
     */
    public function setBetterCondition(?string $better_condition): csvCreateProjectParameter
    {
        $this->better_condition = $better_condition;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getWorkStart(): ?string
    {
        return $this->work_start;
    }

    /**
     * @param string|null $work_start
     * @return csvCreateProjectParameter
     */
    public function setWorkStart(?string $work_start): csvCreateProjectParameter
    {
        $this->work_start = $work_start;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getWorkEnd(): ?string
    {
        return $this->work_end;
    }

    /**
     * @param string|null $work_end
     * @return csvCreateProjectParameter
     */
    public function setWorkEnd(?string $work_end): csvCreateProjectParameter
    {
        $this->work_end = $work_end;
        return $this;
    }

    /**
     * @return int
     */
    public function getWeeklyAttendance(): ?int
    {
        return $this->weekly_attendance;
    }

    /**
     * @param int|null $weekly_attendance
     * @return csvCreateProjectParameter
     */
    public function setWeeklyAttendance(?int $weekly_attendance): csvCreateProjectParameter
    {
        $this->weekly_attendance = $weekly_attendance;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFeature(): ?string
    {
        return $this->feature;
    }

    /**
     * @param string|null $feature
     * @return csvCreateProjectParameter
     */
    public function setFeature(?string $feature): csvCreateProjectParameter
    {
        $this->feature = $feature;
        return $this;
    }

    /**
     * @return array|int[]
     */
    public function getSkillIds(): array
    {
        return $this->skill_ids;
    }

    /**
     * @param array|int[] $skill_ids
     * @return csvCreateProjectParameter
     */
    public function setSkillIds(array $skill_ids): csvCreateProjectParameter
    {
        $this->skill_ids = $skill_ids;
        return $this;
    }

    /**
     * @return array|int[]
     */
    public function getPositionIds(): array
    {
        return $this->position_ids;
    }

    /**
     * @param array|int[] $position_ids
     * @return csvCreateProjectParameter
     */
    public function setPositionIds(array $position_ids): csvCreateProjectParameter
    {
        $this->position_ids = $position_ids;
        return $this;
    }
}
