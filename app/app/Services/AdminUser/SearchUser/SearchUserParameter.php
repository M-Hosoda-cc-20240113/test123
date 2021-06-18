<?php


namespace App\Services\AdminUser\SearchUser;


class SearchUserParameter
{
    /**
     * @const int 最大検索文字長
     */
    const MAX_KEYWORD_LENGTH = 100;

    /**
     * @var int[]|array
     */
    private $skill_ids = [];

    /**
     * @var int[]|array
     */
    private $level_ids = [];

    /**
     * @var string
     */
    private $new_user = '';

    /**
     * @var string
     */
    private $not_new_user = '';

    /**
     * @var string
     */
    private $is_working = '';

    /**
     * @var string
     */
    private $is_not_working = '';

    /**
     * @var string
     */
    private $operation_start_month = '';

    /**
     * @var string
     */
    private $assign_month = '';

    /**
     * @var string
     */
    private $assign_fin_month = '';

    /**
     * @var string
     */
    private $interview_month = '';

    /**
     * @var string
     */
    private $status = '';

    /**
     * @return array|null
     */
    public function getSkillIds(): ?array
    {
        return $this->skill_ids;
    }

    /**
     * @param array|int[] $skill_ids
     * @return SearchUserParameter
     */
    public function setSkillIds(array $skill_ids): SearchUserParameter
    {
        $this->skill_ids = $skill_ids;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getLevelIds(): ?array
    {
        return $this->level_ids;
    }

    /**
     * @param array|int[] $level_ids
     * @return SearchUserParameter
     */
    public function setLevelIds(array $level_ids): SearchUserParameter
    {
        $this->level_ids = $level_ids;
        return $this;
    }

    /**
     * @return string
     */
    public function getNewUser(): ?string
    {
        return $this->new_user;
    }

    /**
     * @param string $new_user
     * @return SearchUserParameter
     */
    public function setNewUser(string $new_user): SearchUserParameter
    {
        $this->new_user = $new_user;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotNewUser(): ?string
    {
        return $this->not_new_user;
    }

    /**
     * @param string $not_new_user
     * @return SearchUserParameter
     */
    public function setNotNewUser(string $not_new_user): SearchUserParameter
    {
        $this->not_new_user = $not_new_user;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsWorking(): ?string
    {
        return $this->is_working;
    }

    /**
     * @param string $is_working
     * @return SearchUserParameter
     */
    public function setIsWorking(string $is_working): SearchUserParameter
    {
        $this->is_working = $is_working;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsNotWorking(): ?string
    {
        return $this->is_not_working;
    }

    /**
     * @param string $is_not_working
     * @return SearchUserParameter
     */
    public function setIsNotWorking(string $is_not_working): SearchUserParameter
    {
        $this->is_not_working = $is_not_working;
        return $this;
    }

    /**
     * @return string
     */
    public function getOperationStartMonth(): ?string
    {
        return $this->operation_start_month;
    }

    /**
     * @param string $operation_start_month
     * @return SearchUserParameter
     */
    public function setOperationStartMonth(string $operation_start_month): SearchUserParameter
    {
        $this->operation_start_month = $operation_start_month;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasSkill(): bool
    {
        $count = [];
        foreach ($this->getSkillIds() as $skill_id){
            if ($skill_id) {
                $count[] = $skill_id;
            }
        }
        return count($count) > 0;
    }

    /**
     * @return bool
     */
    public function hasLevel(): bool
    {
        $count = [];
        foreach ($this->getLevelIds() as $skill_id){
            if ($skill_id) {
                $count[] = $skill_id;
            }
        }
        return count($count) > 0;
    }

    /**
     * 文字列配列を数値に変換する
     * @param array $array
     * @return array
     */
    private function toInt(array $array): array
    {
        $arr2 = [];
        foreach ($array as $v) {
            $arr2[] = (int) $v;
        }
        return $arr2;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return SearchUserParameter
     */
    public function setStatus(string $status): SearchUserParameter
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getAssignMonth(): string
    {
        return $this->assign_month;
    }

    /**
     * @param string $assign_month
     * @return SearchUserParameter
     */
    public function setAssignMonth(string $assign_month): SearchUserParameter
    {
        $this->assign_month = $assign_month;
        return $this;
    }

    /**
     * @return string
     */
    public function getAssignFinMonth(): string
    {
        return $this->assign_fin_month;
    }

    /**
     * @param string $assign_fin_month
     * @return SearchUserParameter
     */
    public function setAssignFinMonth(string $assign_fin_month): SearchUserParameter
    {
        $this->assign_fin_month = $assign_fin_month;
        return $this;
    }

    /**
     * @return string
     */
    public function getInterviewMonth(): string
    {
        return $this->interview_month;
    }

    /**
     * @param string $interview_month
     * @return SearchUserParameter
     */
    public function setInterviewMonth(string $interview_month): SearchUserParameter
    {
        $this->interview_month = $interview_month;
        return $this;
    }
}
