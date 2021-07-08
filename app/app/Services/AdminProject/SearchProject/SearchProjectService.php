<?php


namespace App\Services\AdminProject\SearchProject;


use App\Services\Area\AreaRepositoryInterface;
use App\Services\Pagination\PaginatorService;
use App\Services\Position\PositionRepositoryInterface;
use App\Services\Project\ProjectRepositoryInterface;
use App\Services\Skill\SkillRepositoryInterface;
use App\Services\Station\StationRepositoryInterface;
use Illuminate\Support\Collection;

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
     * @var StationRepositoryInterface
     */
    private $station_repository;

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
     * @param \App\Services\Station\StationRepositoryInterface $station_repository
     * @param \App\Services\Area\AreaRepositoryInterface $area_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     */
    public function __construct(
        ProjectRepositoryInterface $project_repository,
        SkillRepositoryInterface $skill_repository,
        PositionRepositoryInterface $position_repository,
        StationRepositoryInterface $station_repository,
        AreaRepositoryInterface $area_repository,
        PaginatorService $paginator_service
    ) {
        $this->project_repository = $project_repository;
        $this->skill_repository = $skill_repository;
        $this->position_repository = $position_repository;
        $this->station_repository = $station_repository;
        $this->area_repository = $area_repository;
        $this->paginator_service = $paginator_service;
    }

    /**
     * @param SearchProjectParameter $parameter
     * @return SearchProjectResponse
     */
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

        // 駅検索
        if ($parameter->hasStation()) {
            $result = $this->project_repository->fetchByStationIds($parameter->getStationIds(), $searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results[] = $result;
        }
        // エリア検索
        if ($parameter->hasArea()) {
            $result = $this->project_repository->fetchByAreaIds($parameter->getAreaIds(), $searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results[] = $result;
        }

        // スキル検索
        if ($parameter->hasSkill()) {
            $result = $this->project_repository->fetchBySkillIds($parameter->getSkillIds(), $searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results[] = $result;
            $count_skill = count($parameter->getSkillIds());
        }

        // ポジション検索
        if ($parameter->hasPosition()) {
            $result = $this->project_repository->fetchByPositionIds($parameter->getPositionIds(), $searched_ids);
            $search_results[] = $result;
            $count_position = count($parameter->getPositionIds());
        }

        // 検索条件がない時
        if (!$parameter->hasKeyword() && !$parameter->hasSkill() && !$parameter->hasPosition() && !$parameter->hasStation() && !$parameter->hasArea()) {
            $result = $this->project_repository->all();
            $search_results[] = $result;
        }

        $skills = $this->skill_repository->all();
        $positions = $this->position_repository->all();
        $stations = $this->station_repository->all();
        $areas = $this->area_repository->all();
        $projects = $this->getResultMerged($search_results);
        $max_count = max($count_skill ?? 0, $count_position ?? 0);
        $response = new SearchProjectResponse();
        $response->setProjects($this->paginator_service->paginate($projects));
        $response->setProjectCounts($projects->count());
        $response->setStations($stations);
        $response->setAreas($areas);
        $response->setSkills($skills);
        $response->setPositions($positions);
        $response->setCountPositionSkill($max_count ?? 0);
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
