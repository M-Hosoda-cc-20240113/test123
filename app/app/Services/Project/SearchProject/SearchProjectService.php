<?php


namespace App\Services\Project\SearchProject;


use App\Services\Position\PositionRepositoryInterface;
use App\Services\Project\ProjectRepositoryInterface;
use App\Services\Skill\SkillRepositoryInterface;
use App\Services\Station\StationRepositoryInterface;
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
     * @var StationRepositoryInterface
     */
    private $station_repository;

    /**
     * SearchProjectService constructor.
     * @param \App\Services\Project\ProjectRepositoryInterface $project_repository
     * @param \App\Services\Skill\SkillRepositoryInterface $skill_repository
     * @param \App\Services\Position\PositionRepositoryInterface $position_repository
     * @param \App\Services\Station\StationRepositoryInterface $station_repository
     */
    public function __construct(
        ProjectRepositoryInterface $project_repository,
        SkillRepositoryInterface $skill_repository,
        PositionRepositoryInterface $position_repository,
        StationRepositoryInterface $station_repository
    ) {
        $this->project_repository = $project_repository;
        $this->skill_repository = $skill_repository;
        $this->position_repository = $position_repository;
        $this->station_repository = $station_repository;
    }

    /**
     * @param \App\Services\Project\SearchProject\SearchProjectParameter $parameter
     * @return \App\Services\Top\FetchTopData\FetchTopResponse
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

        $skills = $this->skill_repository->all();
        $positions = $this->position_repository->all();
        $stations = $this->station_repository->all();

        $response = new FetchTopResponse();
        $response->setProjects($this->getResultMerged($search_results));
        $response->setSkills($skills);
        $response->setPositions($positions);
        $response->setStations($stations);

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
        foreach($search_results as $search_result) {
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