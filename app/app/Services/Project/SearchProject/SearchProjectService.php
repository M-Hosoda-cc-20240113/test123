<?php


namespace App\Services\Project\SearchProject;


use App\Services\Pagination\PaginatorService;
use App\Services\Position\PositionRepositoryInterface;
use App\Services\Project\ProjectRepositoryInterface;
use App\Services\Skill\SkillRepositoryInterface;
use App\Services\Area\AreaRepositoryInterface;
use App\Services\Top\FetchTopData\FetchTopResponse;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class SearchProjectService
 * @package App\Services\Project\SearchProject
 */
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
     * @var AreaRepositoryInterface
     */
    private $area_repository;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * SearchProjectService constructor.
     * @param \App\Services\Project\ProjectRepositoryInterface $project_repository
     * @param \App\Services\Skill\SkillRepositoryInterface $skill_repository
     * @param \App\Services\Position\PositionRepositoryInterface $position_repository
     * @param \App\Services\Area\AreaRepositoryInterface $area_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     */
    public function __construct(
        ProjectRepositoryInterface $project_repository,
        SkillRepositoryInterface $skill_repository,
        PositionRepositoryInterface $position_repository,
        AreaRepositoryInterface $area_repository,
        PaginatorService $paginator_service
    ) {
        $this->project_repository = $project_repository;
        $this->skill_repository = $skill_repository;
        $this->position_repository = $position_repository;
        $this->area_repository = $area_repository;
        $this->paginator_service = $paginator_service;
    }

    /**
     * @param SearchProjectParameter $parameter
     * @return FetchTopResponse
     */
    public function search(SearchProjectParameter $parameter): FetchTopResponse
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
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results[] = $result;
        }

        // エリア検索
        if ($parameter->hasArea()) {
            $result = $this->project_repository->fetchByAreaIds($parameter->getAreaIds(), $searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results[] = $result;
        }

        // 検索条件がない時
        if (!$parameter->hasKeyword() && !$parameter->hasSkill() && !$parameter->hasPosition() && !$parameter->hasArea()) {
            $result = $this->project_repository->fetchCanApply();
            $search_results[] = $result;
        }

        $skills = $this->skill_repository->all();
        $positions = $this->position_repository->all();
        $stations = $this->area_repository->all();
        $projects = $this->getResultMerged($search_results)->whereNotIn('decided', 1);
        $response = new FetchTopResponse();
        $response->setProjects($this->paginator_service->paginate($projects, 9));
        $response->setProjectCounts($projects->count());
        $response->setSkills($skills);
        $response->setPositions($positions);
        $response->setAreas($stations);
        $response->setSearchedSkillIds($parameter->getSkillIds());
        $response->setSearchedPositionIds($parameter->getPositionIds());
        $response->setSearchedAreaIds($parameter->getAreaIds());
        return $response;
    }

    /**
     * 検索結果群をまとめる
     *
     * @param Collection[] $search_results 検索結果たち
     * @return \Illuminate\Support\Collection
     */
    private function getResultMerged(array $search_results): \Illuminate\Support\Collection
    {
        $merged = collect();
        foreach ($search_results as $search_result) {
            $merged = $merged->merge($search_result);
        }
        return $merged;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection $projects
     * @return array
     */
    private function gatherSearchdIds(Collection $projects): array
    {
        return $projects->map(static function ($item) {
            return $item->id;
        })->toArray();
    }
}
