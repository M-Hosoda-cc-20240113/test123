<?php

namespace App\Services\Project;

use App\Models\Project;
use App\Services\AdminProject\CreateProject\CreateProjectParameter;
use App\Services\AdminProject\csvCreateProject\CsvCreateProjectParameter;
use App\Services\AdminProject\DeleteProject\DeleteProjectParameter;
use App\Services\AdminProject\ToggleProjectDisplay\ProjectDisplayToggleParameter;
use App\Services\AdminProject\UpdateProject\UpdateProjectParameter;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface ProjectRepositoryInterface
 * @package App\Services\Project
 */
interface ProjectRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * プロジェクト新規登録（Admin）
     * @param CreateProjectParameter $parameter
     * @return Project
     */
    public function create(CreateProjectParameter $parameter): Project;

    /**
     * プロジェクト更新機能（Admin）
     * @param \App\Services\AdminProject\UpdateProject\UpdateProjectParameter $parameter
     * @return Project
     */
    public function update(UpdateProjectParameter $parameter):Project;

    /**
     * プロジェクト詳細（Front）
     * @param int $project_id
     * @return Project
     */
    public function findWithUsersThroughApplicationOrAssignment(int $project_id): Project;

    /**
     * プロジェクト詳細（Admin）
     * @param int $project_id
     * @return Project
     */
    public function findWithUsersAndAgentThroughApplicationOrAssignment(int $project_id): Project;


    /**
     * @return Collection
     */
    public function fetchCanApply(): Collection;

    /**
     * 応募終了処理
     * @param ProjectDisplayToggleParameter $parameter
     * @return Project
     */
    public function close(ProjectDisplayToggleParameter $parameter): Project;

    /**
     * 応募開始処理
     * @param ProjectDisplayToggleParameter $parameter
     * @return Project
     */
    public function open(ProjectDisplayToggleParameter $parameter): Project;

    /**
     * キーワード検索
     * @param string[] $keywords
     * @param int[] $exclude_ids
     * @return Project[]|Collection
     */
    public function fetchByKeyWord(array $keywords, array $exclude_ids = []);

    /**
     * @return array
     */
    public function fetchAppAssignProjectId(): array;

    /**
     * スキル検索
     * @param int[]|array $skill_ids
     * @param int[]|array $exclude_ids
     * @return Project[]|Collection
     */
    public function fetchBySkillIds(array $skill_ids, array $exclude_ids = []);

    /**
     * @param array $position_ids
     * @param array $exclude_ids
     * @return Project[]|Collection
     */
    public function fetchByPositionIds(array $position_ids, array $exclude_ids = []);

    /**
     * @param array $station_ids
     * @param array $exclude_ids
     * @return Project[]|Collection
     */
    public function fetchByStationIds(array $station_ids, array $exclude_ids = []);

    /**
     * @param DeleteProjectParameter $parameter
     */
    public function delete(DeleteProjectParameter $parameter): void;

    /**
     * @param csvCreateProjectParameter $parameter
     */
    public function csvCreate(CsvCreateProjectParameter $parameter): void;
}
