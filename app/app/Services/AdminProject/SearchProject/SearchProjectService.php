<?php


namespace App\Services\AdminProject\SearchProject;


use App\Services\Area\AreaRepositoryInterface;
use App\Services\Pagination\PaginatorService;
use App\Services\Position\PositionRepositoryInterface;
use App\Services\Project\ProjectRepositoryInterface;
use App\Services\Skill\SkillRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SearchProjectService
{
    /**
     * @var ProjectRepositoryInterface
     */
    private $project_repository;

    /**
     * @var SkillRepositoryInterface
     */
    private $skill_repository;

    /**
     * @var PositionRepositoryInterface
     */
    private $position_repository;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * SearchProjectService constructor.
     * @param \App\Services\Project\ProjectRepositoryInterface $project_repository
     * @param \App\Services\Skill\SkillRepositoryInterface $skill_repository
     * @param \App\Services\Position\PositionRepositoryInterface $position_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     */
    public function __construct(
        ProjectRepositoryInterface $project_repository,
        SkillRepositoryInterface $skill_repository,
        PositionRepositoryInterface $position_repository,
        PaginatorService $paginator_service
    ) {
        $this->project_repository = $project_repository;
        $this->skill_repository = $skill_repository;
        $this->position_repository = $position_repository;
        $this->paginator_service = $paginator_service;
    }

    public function search(SearchProjectParameter $parameter)
    {
        $search_results = [];
        $searched_ids = [];

        // キーワード検索
        if ($parameter->hasKeyword()) {
            $result = $this->project_repository->fetchByKeyWord($parameter->cutKeywordByMaxLength()->explodeKeyword());
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results[] = $result;
        }

        // スキル検索
        if ($parameter->hasSkill()) {
            $result = $this->project_repository->fetchBySkillIds($parameter->getSkillIds(), $searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results[] = $result;
        }

        // ポジション検索
        if ($parameter->hasPosition()) {
            $result = $this->project_repository->fetchByPositionIds($parameter->getPositionIds(), $searched_ids);
            $search_results[] = $result;
        }

        // 検索条件がない時
        if (!$parameter->hasKeyword() && !$parameter->hasSkill() && !$parameter->hasPosition()) {
            $result = $this->project_repository->fetchCanApply();
            $search_results[] = $result;
        }

        $skills = $this->skill_repository->all();
        $positions = $this->position_repository->all();
        $projects = $this->getResultMerged($search_results);
        $response = new SearchProjectResponse();
        $response->setProjects($this->paginator_service->paginate($projects));
        $response->setProjectCounts($projects->count());
        $response->setSkills($skills);
        $response->setPositions($positions);
        $response->setSearchedSkillIds($parameter->getSkillIds());
        $response->setSearchedPositionIds($parameter->getPositionIds());
        return $response;
    }

    /**
     * 検索結果群をまとめる
     *
     * @param Collection[] $search_results 検索結果たち
     * @return Collection
     */
    private function getResultMerged(array $search_results): Collection {
        $merged = collect();
        foreach ($search_results as $search_result) {
            $merged = $merged->merge($search_result);
        }
        return $merged;
    }

    /**
     * @param Collection $projects
     * @return array
     */
    private function gatherSearchdIds(Collection $projects): array {
        return $projects->map(static function ($item) {
            return $item->id;
        })->toArray();
    }
}
