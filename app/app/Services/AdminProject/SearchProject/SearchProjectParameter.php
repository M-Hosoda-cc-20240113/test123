<?php


namespace App\Services\AdminProject\SearchProject;


class SearchProjectParameter
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
    private $position_ids = [];

    /**
     * @var string
     */
    private $keyword = '';

    /**
     * @return array|int[]
     */
    public function getSkillIds(): array
    {
        return $this->skill_ids;
    }

    /**
     * @param array|int[] $skill_ids
     * @return SearchProjectParameter
     */
    public function setSkillIds(array $skill_ids): SearchProjectParameter
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
     * @return SearchProjectParameter
     */
    public function setPositionIds(array $position_ids): SearchProjectParameter
    {
        $this->position_ids = $position_ids;
        return $this;
    }

    /**
     * @return string
     */
    public function getKeyword(): string
    {
        return $this->keyword;
    }

    /**
     * @param string $keyword
     * @return SearchProjectParameter
     */
    public function setKeyword(string $keyword): SearchProjectParameter
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
    public function hasPosition(): bool
    {
        return count($this->getPositionIds()) > 0;
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
     * @return SearchProjectParameter
     */
    public function cutKeywordByMaxLength(): SearchProjectParameter
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
