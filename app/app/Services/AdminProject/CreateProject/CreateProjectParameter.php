<?php

namespace App\Services\AdminProject\CreateProject;

use App\Models\Agent;
use App\Models\Station;
use App\Models\Project;

class CreateProjectParameter
{
    /**
     * @var Project
     */
    private $project;

    /**
     * 案件名
     *
     * @var string
     */
    private $name;

    /**
     * @var Agent
     */
    private $agent;

    /**
     * @var int
     */
    private $station;
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
     * @var int
     */
    private $skill1;

    /**
     * @var int
     */
    private $skill2;

    /**
     * @var int
     */
    private $skill3;

    /**
     * @var int
     */
    private $position1;

    /**
     * @var int
     */
    private $position2;

    /**
     * @var int
     */
    private $position3;


    /**
     * Get 案件名
     *
     * @return  string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set 案件名
     *
     * @param string $name 案件名
     *
     * @return  self
     */
    public function setName(string $name): CreateProjectParameter
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get 最小案件単価
     *
     * @return  int
     */
    public function getMinUnitPrice(): int
    {
        return $this->min_unit_price;
    }

    /**
     * Set 最小案件単価
     *
     * @param int $min_unit_price 最小案件単価
     *
     * @return  self
     */
    public function setMinUnitPrice(int $min_unit_price): CreateProjectParameter
    {
        $this->min_unit_price = $min_unit_price;
        return $this;
    }

    /**
     * Get 最大案件単価
     *
     * @return  int
     */
    public function getMaxUnitPrice(): int
    {
        return $this->max_unit_price;
    }

    /**
     * Set 最大案件単価
     *
     * @param int $max_unit_price 最大案件単価
     *
     * @return  self
     */
    public function setMaxUnitPrice(int $max_unit_price): CreateProjectParameter
    {
        $this->max_unit_price = $max_unit_price;
        return $this;
    }

    /**
     * Get 最小稼働時間
     *
     * @return  int
     */
    public function getMinOperationTime(): int
    {
        return $this->min_operation_time;
    }

    /**
     * Set 最小稼働時間
     *
     * @param int $min_operation_time 最小稼働時間
     *
     * @return  self
     */
    public function setMinOperationTime(int $min_operation_time): CreateProjectParameter
    {
        $this->min_operation_time = $min_operation_time;
        return $this;
    }

    /**
     * Get 最大稼働時間
     *
     * @return  int
     */
    public function getMaxOperationTime(): int
    {
        return $this->max_operation_time;
    }

    /**
     * Set 最大稼働時間
     *
     * @param int $max_operation_time 最大稼働時間
     *
     * @return  self
     */
    public function setMaxOperationTime(int $max_operation_time): CreateProjectParameter
    {
        $this->max_operation_time = $max_operation_time;
        return $this;
    }

    /**
     * Get 案件概要
     *
     * @return  string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set 案件概要
     *
     * @param string $description 案件概要
     *
     * @return  self
     */
    public function setDescription(string $description): CreateProjectParameter
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get 必須条件
     *
     * @return  string
     */
    public function getRequiredCondition(): string
    {
        return $this->required_condition;
    }

    /**
     * Set 必須条件
     *
     * @param string $required_condition 必須条件
     *
     * @return  self
     */
    public function setRequiredCondition(string $required_condition): CreateProjectParameter
    {
        $this->required_condition = $required_condition;
        return $this;
    }

    /**
     * Get 尚可条件
     *
     * @return  string
     */
    public function getBetterCondition(): string
    {
        return $this->better_condition;
    }

    /**
     * Set 尚可条件
     *
     * @param string $better_condition 尚可条件
     *
     * @return  self
     */
    public function setBetterCondition(string $better_condition): CreateProjectParameter
    {
        $this->better_condition = $better_condition;
        return $this;
    }

    /**
     * Get 勤務開始時間
     *
     * @return  string
     */
    public function getWorkStart(): string
    {
        return $this->work_start;
    }

    /**
     * Set 勤務開始時間
     *
     * @param string $work_start 勤務開始時間
     *
     * @return  self
     */
    public function setWorkStart(string $work_start): CreateProjectParameter
    {
        $this->work_start = $work_start;
        return $this;
    }

    /**
     * Get 勤務終了時間
     *
     * @return  string
     */
    public function getWorkEnd(): string
    {
        return $this->work_end;
    }

    /**
     * Set 勤務終了時間
     *
     * @param string $work_end 勤務終了時間
     *
     * @return  self
     */
    public function setWorkEnd(string $work_end): CreateProjectParameter
    {
        $this->work_end = $work_end;
        return $this;
    }

    /**
     * Get 出勤回数/週
     *
     * @return  int
     */
    public function getWeeklyAttendance(): int
    {
        return $this->weekly_attendance;
    }

    /**
     * Set 出勤回数/週
     *
     * @param int $weekly_attendance 出勤回数/週
     *
     * @return  self
     */
    public function setWeeklyAttendance(int $weekly_attendance): CreateProjectParameter
    {
        $this->weekly_attendance = $weekly_attendance;
        return $this;
    }

    /**
     * Get 特徴
     *
     * @return  string
     */
    public function getFeature(): string
    {
        return $this->feature;
    }

    /**
     * Set 特徴
     *
     * @param string $feature 特徴
     *
     * @return  self
     */
    public function setFeature(string $feature): CreateProjectParameter
    {
        $this->feature = $feature;
        return $this;
    }

    /**
     * @return int
     */
    public function getAgent(): int
    {
        return $this->agent;
    }

    /**
     * @param int $agent
     * @return \App\Services\AdminProject\CreateProject\CreateProjectParameter
     */
    public function setAgent(int $agent): CreateProjectParameter
    {
        $this->agent = $agent;
        return $this;
    }

    /**
     * @return int
     */
    public function getStation(): int
    {
        return $this->station;
    }

    /**
     * @param int $station
     * @return \App\Services\AdminProject\CreateProject\CreateProjectParameter
     */
    public function setStation(int $station): CreateProjectParameter
    {
        $this->station = $station;
        return $this;
    }

    /**
     * @return int
     */
    public function getSkill1(): int
    {
        return $this->skill1;
    }

    /**
     * @param int $skill1
     */
    public function setSkill1(int $skill1): CreateProjectParameter
    {
        $this->skill1 = $skill1;
        return $this;
    }

    /**
     * @return int
     */
    public function getSkill2(): int
    {
        return $this->skill2;
    }

    /**
     * @param int $skill2
     * @return \App\Services\AdminProject\CreateProject\CreateProjectParameter
     */
    public function setSkill2(int $skill2): CreateProjectParameter
    {
        $this->skill2 = $skill2;
        return $this;
    }

    /**
     * @return int
     */
    public function getSkill3(): int
    {
        return $this->skill3;
    }

    /**
     * @param int $skill3
     * @return \App\Services\AdminProject\CreateProject\CreateProjectParameter
     */
    public function setSkill3(int $skill3): CreateProjectParameter
    {
        $this->skill3 = $skill3;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition1(): int
    {
        return $this->position1;
    }

    /**
     * @param int $position1
     */
    public function setPosition1(int $position1): CreateProjectParameter
    {
        $this->position1 = $position1;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition2(): int
    {
        return $this->position2;
    }

    /**
     * @param int $position2
     */
    public function setPosition2(int $position2): CreateProjectParameter
    {
        $this->position2 = $position2;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition3(): int
    {
        return $this->position3;
    }

    /**
     * @param int $position3
     */
    public function setPosition3(int $position3): CreateProjectParameter
    {
        $this->position3 = $position3;
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
     * @return \App\Services\AdminProject\CreateProject\CreateProjectParameter
     */
    public function setProject(Project $project): CreateProjectParameter
    {
        $this->project = $project;
        return $this;
    }


}
