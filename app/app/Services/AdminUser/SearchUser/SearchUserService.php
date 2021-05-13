<?php


namespace App\Services\AdminUser\SearchUser;

use App\Services\AdminUser\UserList\UserListResponse;
use App\Services\Pagination\PaginatorService;
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
     * SearchUserService constructor.
     * @param UserRepositoryInterface $user_repository
     * @param PaginatorService $paginator_service
     */
    public function __construct(UserRepositoryInterface $user_repository, PaginatorService $paginator_service)
    {
        $this->user_repository = $user_repository;
        $this->paginator_service = $paginator_service;
    }

    /**
     * @param SearchUserParameter $parameter
     * @return LengthAwarePaginator
     */
    public function search(SearchUserParameter $parameter)
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
        if ($parameter->getNewUser()) {
            $result = $this->user_repository->fetchByNewUser($searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results = [];
            $search_results[] = $result;
        }

        // 既存ユーザー検索
        if ($parameter->getNotNewUser()) {
            $result = $this->user_repository->fetchByNotNewUser($searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results = [];
            $search_results[] = $result;
        }

        // 稼働済みユーザー検索
        if ($parameter->getIsWorking()) {
            $result = $this->user_repository->fetchByIsWorking($searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results = [];
            $search_results[] = $result;
        }

        // 未稼働ユーザー検索
        if ($parameter->getIsNotWorking()) {
            $result = $this->user_repository->fetchByIsNotWorking($searched_ids);
            $searched_ids = array_merge($searched_ids, $this->gatherSearchdIds($result));
            $search_results = [];
            $search_results[] = $result;
        }

        //ダッシュボードのステータス
        if ($parameter->getStatus()) {
            $today = CarbonImmutable::today();
            $status = $parameter->getStatus();
            switch ($status) {
                //今月営業月
                case 1:
                    $result = $this->user_repository->fetchByOperationStartMonth($today, $searched_ids);
                    break;
                //未営業
                case 2:
                    $result = $this->user_repository->fetchNotOpenUserOfThisMonth($today, $searched_ids);
                    break;
                //新規稼働
                case 3:
                    $result = $this->user_repository->fetchNewUserOfThisMonth($today, $searched_ids);
                    break;
                //既存稼働
                case 4:
                    $result = $this->user_repository->fetchNotNewUserOfThisMonth($today, $searched_ids);
                    break;
                //今月面談
                case 5:
                    $result = $this->user_repository->fetchInterviewUserOfThisMonth($today, $searched_ids);
                    break;
                default:
                    $result = $this->user_repository->all();
            }
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
        if (!$parameter->hasSkill() && !$parameter->hasLevel() && !$parameter->getNewUser() && !$parameter->getNotNewUser() && !$parameter->getIsWorking() && !$parameter->getIsNotWorking() && !$parameter->getOperationStartMonth() && !$parameter->getStatus()) {
            $result = $this->user_repository->all();
            $search_results = [];
            $search_results[] = $result;
        }

        $users = $this->getResultMerged($search_results);
        $response = new UserListResponse();
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