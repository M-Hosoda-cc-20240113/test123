<?php


namespace App\Services\AdminUser\SearchUser;

use App\Services\Level\LevelRepositoryInterface;
use App\Services\Pagination\PaginatorService;
use App\Services\RelLevelSkillUser\RelLevelSkillUSerRepositoryInterface;
use App\Services\Skill\SkillRepositoryInterface;
use App\Services\User\UserRepositoryInterface;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class SearchUserService
 * @package App\Services\AdminUser\SearchUser
 */
class SearchUserService
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * @var SkillRepositoryInterface
     */
    private $skill_repository;

    /**
     * @var LevelRepositoryInterface
     */
    private $level_repository;

    /**
     * @var RelLevelSkillUSerRepositoryInterface
     */
    private $rel_revel_skill_user_repository;

    /**
     * SearchUserService constructor.
     * @param \App\Services\User\UserRepositoryInterface $user_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     * @param \App\Services\Skill\SkillRepositoryInterface $skill_repository
     * @param \App\Services\Level\LevelRepositoryInterface $level_repository
     * @param \App\Services\RelLevelSkillUser\RelLevelSkillUSerRepositoryInterface $rel_revel_skill_user_repository
     */
    public function __construct(
        UserRepositoryInterface $user_repository,
        PaginatorService $paginator_service,
        SkillRepositoryInterface $skill_repository,
        LevelRepositoryInterface $level_repository,
        RelLevelSkillUSerRepositoryInterface $rel_revel_skill_user_repository
    ) {
        $this->user_repository = $user_repository;
        $this->paginator_service = $paginator_service;
        $this->skill_repository = $skill_repository;
        $this->level_repository = $level_repository;
        $this->rel_revel_skill_user_repository = $rel_revel_skill_user_repository;
    }

    /**
     * @param SearchUserParameter $parameter
     * @return SearchUserResponse
     */
    public function search(SearchUserParameter $parameter): SearchUserResponse
    {
        $search_results = [];
        $searched_ids = [];

        // スキル検索
        if ($parameter->hasSkill()) {
            $result = $this->user_repository->fetchBySkillIds($parameter->getSkillIds(), $searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results = [];
            $search_results[] = $result;
        }

        // レベル検索
        if ($parameter->hasLevel()) {
            $result = $this->user_repository->fetchByLevelIds($parameter->getLevelIds(), $searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results = [];
            $search_results[] = $result;
        }

        // 新規ユーザー検索
        if ($parameter->getNewUser() === '1') {
            $result = $this->user_repository->fetchByNewUser($searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results = [];
            $search_results[] = $result;
        }

        // 既存ユーザー検索
        if ($parameter->getNewUser() === '0') {
            $result = $this->user_repository->fetchByNotNewUser($searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results = [];
            $search_results[] = $result;
        }

        // 稼働済みユーザー検索
        if ($parameter->getIsWorking() === "1") {
            $result = $this->user_repository->fetchByIsWorking($searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results = [];
            $search_results[] = $result;
        }

        // 未稼働ユーザー検索
        if ($parameter->getIsWorking() === "2") {
            $result = $this->user_repository->fetchByIsNotWorking($searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results = [];
            $search_results[] = $result;
        }

        //status: 0：未営業、1：面談待ち、2：結果待ち、3：稼働済み
        if ($parameter->getStatus() === '0' || $parameter->getStatus() === '1' || $parameter->getStatus() === '2' || $parameter->getStatus() === '3' ) {
            $result = $this->user_repository->fetchByStatus($parameter->getStatus(), $searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results = [];
            $search_results[] = $result;
        }

        // 面談予定月
        if ($parameter->getInterviewMonth()) {
            $result = $this->user_repository->fetchByInterviewMonth($parameter->getInterviewMonth(),
                $searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results = [];
            $search_results[] = $result;
        }

        // 稼働月
        if ($parameter->getAssignMonth()) {
            $result = $this->user_repository->fetchByAssignMonth($parameter->getAssignMonth(),
                $searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results = [];
            $search_results[] = $result;
        }

        // 営業月検索
        if ($parameter->getOperationStartMonth()) {
            $result = $this->user_repository->fetchByOperationStartMonth($parameter->getOperationStartMonth(),
                $searched_ids);
            $search_results = [];
            $search_results[] = $result;
        }

        // 検索条件がない時
        if (!$parameter->hasSkill() && !$parameter->hasLevel() && !$parameter->getNewUser() && !$parameter->getNotNewUser() && !$parameter->getIsWorking() && !$parameter->getIsNotWorking() && !$parameter->getOperationStartMonth() && !$parameter->getStatus() && !$parameter->getInterviewMonth() && !$parameter->getAssignMonth()) {
            $result = $this->user_repository->all();
            $search_results = [];
            $search_results[] = $result;
        }

        $users = $this->getResultMerged($search_results);
        $skills = $this->skill_repository->all();
        $levels = $this->level_repository->all();
        $rel_level_skill = [];
        $response = new SearchUserResponse();
        $response->setUserCounts($users->count());
        $response->setSkills($skills);
        $response->setLevels($levels);
        $response->setRelLevelSkill($rel_level_skill ?? []);
        $response->setUsers($this->paginator_service->paginate($users));
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
     * @param \Illuminate\Database\Eloquent\Collection $user
     * @return array
     */
    private function gatherSearchdIds(Collection $user): array
    {
        return $user->map(static function ($item) {
            return $item->id;
        })->toArray();
    }
}
