<?php


namespace App\Services\Project\SearchProject;


use App\Services\Project\ProjectRepositoryInterface;
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
     * SearchProjectService constructor.
     * @param ProjectRepositoryInterface $project_repository
     */
    public function __construct(ProjectRepositoryInterface $project_repository)
    {
        $this->project_repository = $project_repository;
    }

    /**
     * 様々な条件で検索する
     *
     * @param SearchProjectParameter $parameter
     * @return SearchProjectResponse
     */
    public function search(SearchProjectParameter $parameter): SearchProjectResponse
    {
        $response = new SearchProjectResponse();
        $search_results = [];
        $searched_ids = [];

        // キーワード検索
        if ($parameter->hasKeyword()) {
            $result = $this->project_repository->fetchByKeyWord($parameter->cutKeywordByMaxLength()->explodeKeyword());
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results[] = $result;
        }

        return $response->setItems($this->getResultMerged($search_results));
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