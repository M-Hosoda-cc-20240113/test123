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
    private $keyword = '';

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
     * @return string
     */
    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    /**
     * @param string $keyword
     * @return SearchUserParameter
     */
    public function setKeyword(string $keyword): SearchUserParameter
    {
        $this->keyword = $keyword;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasKeyword(): bool
    {
        return count($this->explodeKeyword()) > 0;
    }

    /**
     * @return bool
     */
    public function hasSkill(): bool
    {
        return count($this->getSkillIds()) > 0;
    }

    /**
     * @return bool
     */
    public function hasLevel(): bool
    {
        return count($this->getLevelIds()) > 0;
    }

    /**
     * @return string[]
     */
    public function explodeKeyword(): array
    {
        $converted = trim(mb_convert_kana($this->keyword, 's'));
        if ($converted === '') {
            return [];
        }
        return explode(' ', $converted);
    }

    /**
     * @return $this
     */
    public function cutKeywordByMaxLength(): SearchUserParameter
    {
        $this->keyword = mb_substr($this->keyword, 0, self::MAX_KEYWORD_LENGTH, 'utf-8');
        return $this;
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
}
