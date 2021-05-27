<?php


namespace App\Services\AdminProject\UpdateProject;


use App\Models\Agent;
use App\Models\Project;

class UpdateProjectParameter
{
    /**
     * @var int
     */
    private $project_id;

    /**
     * 案件名
     *
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
     * 最小案件単価
     *
     * @var int
     */
    private $min_unit_price;

    /**
     * 最大案件単価
     *
     * @var int
     */
    private $max_unit_price;

    /**
     * 最小稼働時間
     *
     * @var int
     */
    private $min_operation_time;

    /**
     * 最大稼働時間
     *
     * @var int
     */
    private $max_operation_time;

    /**
     * 案件概要
     *
     * @var string
     */
    private $description;

    /**
     * 必須条件
     *
     * @var string
     */
    private $required_condition;

    /**
     * 尚可条件
     *
     * @var string
     */
    private $better_condition;

    /**
     * 勤務開始時間
     *
     * @var string
     */
    private $work_start;

    /**
     * 勤務終了時間
     *
     * @var string
     */
    private $work_end;

    /**
     * 出勤回数/週
     *
     * @var int
     */
    private $weekly_attendance;

    /**
     * 特徴
     *
     * @var string
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
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->project_id;
    }

    /**
     * @param int $project_id
     * @return UpdateProjectParameter
     */
    public function setProjectId(int $project_id): UpdateProjectParameter
    {
        $this->project_id = $project_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UpdateProjectParameter
     */
    public function setName(string $name): UpdateProjectParameter
    {
        $this->name = $name;
        return $this;
    }

    /*
     * @return int|null
     */
    public function getAgentId(): ?int
    {
        return $this->agent_id;
    }

    /**
     * @param int|null $agent_id
     * @return UpdateProjectParameter
     */
    public function setAgentId(?int $agent_id): UpdateProjectParameter
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
     * @return UpdateProjectParameter
     */
    public function setStationId(?int $station_id): UpdateProjectParameter
    {
        $this->station_id = $station_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getMinUnitPrice(): ?string
    {
        return $this->min_unit_price;
    }

    /**
     * @param string|null $min_unit_price
     * @return \App\Services\AdminProject\UpdateProject\UpdateProjectParameter
     */
    public function setMinUnitPrice(?string $min_unit_price): UpdateProjectParameter
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
     * @param int $max_unit_price
     * @return UpdateProjectParameter
     */
    public function setMaxUnitPrice(int $max_unit_price): UpdateProjectParameter
    {
        $this->max_unit_price = $max_unit_price;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMinOperationTime(): ?string
    {
        return $this->min_operation_time;
    }

    /**
     * @param string|null $min_operation_time
     * @return UpdateProjectParameter
     */
    public function setMinOperationTime(?string $min_operation_time): UpdateProjectParameter
    {
        $this->min_operation_time = $min_operation_time;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMaxOperationTime(): ?string
    {
        return $this->max_operation_time;
    }

    /**
     * @param string|null $max_operation_time
     * @return UpdateProjectParameter
     */
    public function setMaxOperationTime(?string $max_operation_time): UpdateProjectParameter
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
     * @return UpdateProjectParameter
     */
    public function setDescription(string $description): UpdateProjectParameter
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequiredCondition(): string
    {
        return $this->required_condition;
    }

    /**
     * @param string $required_condition
     * @return UpdateProjectParameter
     */
    public function setRequiredCondition(string $required_condition): UpdateProjectParameter
    {
        $this->required_condition = $required_condition;
        return $this;
    }

    /**
     * @return string
     */
    public function getBetterCondition(): string
    {
        return $this->better_condition;
    }

    /**
     * @param string $better_condition
     * @return UpdateProjectParameter
     */
    public function setBetterCondition(string $better_condition): UpdateProjectParameter
    {
        $this->better_condition = $better_condition;
        return $this;
    }

    /**
     * @return string
     */
    public function getWorkStart(): ?string
    {
        return $this->work_start;
    }

    /**
     * @param string|null $work_start
     * @return UpdateProjectParameter
     */
    public function setWorkStart(?string $work_start): UpdateProjectParameter
    {
        $this->work_start = $work_start;
        return $this;
    }

    /**
     * @return string
     */
    public function getWorkEnd(): ?string
    {
        return $this->work_end;
    }

    /**
     * @param string|null $work_end
     * @return UpdateProjectParameter
     */
    public function setWorkEnd(?string $work_end): UpdateProjectParameter
    {
        $this->work_end = $work_end;
        return $this;
    }

    /**
     * @return int
     */
    public function getWeeklyAttendance(): int
    {
        return $this->weekly_attendance;
    }

    /**
     * @param int $weekly_attendance
     * @return UpdateProjectParameter
     */
    public function setWeeklyAttendance(int $weekly_attendance): UpdateProjectParameter
    {
        $this->weekly_attendance = $weekly_attendance;
        return $this;
    }

    /**
     * @return string
     */
    public function getFeature(): string
    {
        return $this->feature;
    }

    /**
     * @param string $feature
     * @return UpdateProjectParameter
     */
    public function setFeature(string $feature): UpdateProjectParameter
    {
        $this->feature = $feature;
        return $this;
    }

    /**
     * @return array
     */
    public function getSkillIds(): array
    {
        return $this->skill_ids;
    }

    /**
     * @param array $skill_ids
     * @return UpdateProjectParameter
     */
    public function setSkillIds(array $skill_ids): UpdateProjectParameter
    {
        $this->skill_ids = $skill_ids;
        return $this;
    }

    /**
     * @return array
     */
    public function getPositionIds(): array
    {
        return $this->position_ids;
    }

    /**
     * @param array $position_ids
     * @return UpdateProjectParameter
     */
    public function setPositionIds(array $position_ids): UpdateProjectParameter
    {
        $this->position_ids = $position_ids;
        return $this;
    }

}
