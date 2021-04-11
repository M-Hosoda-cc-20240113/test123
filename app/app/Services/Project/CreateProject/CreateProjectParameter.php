<?php

namespace App\Services\Project\CreateProject;

class CreateProjectParameter
{
  /**
   * 案件名
   *
   * @var string
   */
  private $name;

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
   * 案件が決まっているかどうか
   *
   * @var bool
   */ 
  private $decided;

  /**
   * Get 案件名
   *
   * @return  string
   */ 
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set 案件名
   *
   * @param  string  $name  案件名
   *
   * @return  self
   */ 
  public function setName(string $name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get 最小案件単価
   *
   * @return  int
   */ 
  public function getMinUnitPrice()
  {
    return $this->min_unit_price;
  }

  /**
   * Set 最小案件単価
   *
   * @param  int  $min_unit_price  最小案件単価
   *
   * @return  self
   */ 
  public function setMinUnitPrice(int $min_unit_price)
  {
    $this->min_unit_price = $min_unit_price;

    return $this;
  }

  /**
   * Get 最大案件単価
   *
   * @return  int
   */ 
  public function getMaxUnitPrice()
  {
    return $this->max_unit_price;
  }

  /**
   * Set 最大案件単価
   *
   * @param  int  $max_unit_price  最大案件単価
   *
   * @return  self
   */ 
  public function setMaxUnitPrice(int $max_unit_price)
  {
    $this->max_unit_price = $max_unit_price;

    return $this;
  }

  /**
   * Get 最小稼働時間
   *
   * @return  int
   */ 
  public function getMinOperationTime()
  {
    return $this->min_operation_time;
  }

  /**
   * Set 最小稼働時間
   *
   * @param  int  $min_operation_time  最小稼働時間
   *
   * @return  self
   */ 
  public function setMinOperationTime(int $min_operation_time)
  {
    $this->min_operation_time = $min_operation_time;

    return $this;
  }

  /**
   * Get 最大稼働時間
   *
   * @return  int
   */ 
  public function getMaxOperationTime()
  {
    return $this->max_operation_time;
  }

  /**
   * Set 最大稼働時間
   *
   * @param  int  $max_operation_time  最大稼働時間
   *
   * @return  self
   */ 
  public function setMaxOperationTime(int $max_operation_time)
  {
    $this->max_operation_time = $max_operation_time;

    return $this;
  }

  /**
   * Get 案件概要
   *
   * @return  string
   */ 
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * Set 案件概要
   *
   * @param  string  $description  案件概要
   *
   * @return  self
   */ 
  public function setDescription(string $description)
  {
    $this->description = $description;

    return $this;
  }

  /**
   * Get 必須条件
   *
   * @return  string
   */ 
  public function getRequiredCondition()
  {
    return $this->required_condition;
  }

  /**
   * Set 必須条件
   *
   * @param  string  $required_condition  必須条件
   *
   * @return  self
   */ 
  public function setRequiredCondition(string $required_condition)
  {
    $this->required_condition = $required_condition;

    return $this;
  }

  /**
   * Get 尚可条件
   *
   * @return  string
   */ 
  public function getBetterCondition()
  {
    return $this->better_condition;
  }

  /**
   * Set 尚可条件
   *
   * @param  string  $better_condition  尚可条件
   *
   * @return  self
   */ 
  public function setBetterCondition(string $better_condition)
  {
    $this->better_condition = $better_condition;

    return $this;
  }

  /**
   * Get 勤務開始時間
   *
   * @return  string
   */ 
  public function getWorkStart()
  {
    return $this->work_start;
  }

  /**
   * Set 勤務開始時間
   *
   * @param  string  $work_start  勤務開始時間
   *
   * @return  self
   */ 
  public function setWorkStart(string $work_start)
  {
    $this->work_start = $work_start;

    return $this;
  }

  /**
   * Get 勤務終了時間
   *
   * @return  string
   */ 
  public function getWorkEnd()
  {
    return $this->work_end;
  }

  /**
   * Set 勤務終了時間
   *
   * @param  string  $work_end  勤務終了時間
   *
   * @return  self
   */ 
  public function setWorkEnd(string $work_end)
  {
    $this->work_end = $work_end;

    return $this;
  }

  /**
   * Get 出勤回数/週
   *
   * @return  int
   */ 
  public function getWeeklyAttendance()
  {
    return $this->weekly_attendance;
  }

  /**
   * Set 出勤回数/週
   *
   * @param  int  $weekly_attendance  出勤回数/週
   *
   * @return  self
   */ 
  public function setWeeklyAttendance(int $weekly_attendance)
  {
    $this->weekly_attendance = $weekly_attendance;

    return $this;
  }

  /**
   * Get 特徴
   *
   * @return  string
   */ 
  public function getFeature()
  {
    return $this->feature;
  }

  /**
   * Set 特徴
   *
   * @param  string  $feature  特徴
   *
   * @return  self
   */ 
  public function setFeature(string $feature)
  {
    $this->feature = $feature;

    return $this;
  }

  /**
   * Get the value of decided
   */ 
  public function getDecided()
  {
    return $this->decided;
  }

  /**
   * Set the value of decided
   *
   * @return  self
   */ 
  public function setDecided($decided)
  {
    $this->decided = $decided;

    return $this;
  }
}
