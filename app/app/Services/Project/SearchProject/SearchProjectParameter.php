<?php


namespace App\Services\Project\SearchProject;


/**
 * Class SearchProjectParameter
 * @package App\Services\Project\SearchProject
 */
class SearchProjectParameter
{
    /**
     * @const int 最大検索文字長
     */
    const MAX_KEYWORD_LENGTH = 100;
    /**
     * @var int 何件欲しいか
     */
    private $hits = 4;

    /**
     * @var int 何ページ目か
     */
    private $page = 1;

    /**
     * @var array
     */
    private $skill_ids = [];

    /**
     * @var string
     */
    private $keyword = '';

    /**
     * @return int
     */
    public function getHits(): int
    {
        return $this->hits;
    }

    /**
     * @param int $hits
     * @return SearchProjectParameter
     */
    public function setHits(int $hits): SearchProjectParameter
    {
        $this->hits = $hits;
        return $this;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return SearchProjectParameter
     */
    public function setPage(int $page): SearchProjectParameter
    {
        $this->page = $page;
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
     * @return SearchProjectParameter
     */
    public function setSkillIds(array $skill_ids): SearchProjectParameter
    {
        $this->skill_ids = $skill_ids;
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
     * @return int
     */
    public function getOffset(): int
    {
        return $this->hits * ($this->page - 1);
    }

    /**
     * @return bool
     */
    public function hasKeyword(): bool
    {
        return count($this->explodeKeyword()) > 0;
    }

    public function hasSkill(): bool
    {
        return count($this->getSkillIds()) > 0;
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

    public function cutKeywordByMaxLength(): SearchProjectParameter
    {
        $this->keyword = mb_substr($this->keyword, 0, self::MAX_KEYWORD_LENGTH, 'utf-8');
        return $this;
    }
}