<?php

namespace App\Services\Project;

use App\Models\Project;
use App\Services\AdminProject\CreateProject\CreateProjectParameter;
use App\Services\AdminProject\UpdateProject\UpdateProjectParameter;
use Illuminate\Support\Collection;

interface ProjectRepositoryInterface
{
    public function all();

    /**
     * プロジェクト新規登録（Admin）
     * @param CreateProjectParameter $parameter
     * @return Project
     */
    public function create(CreateProjectParameter $parameter): Project;

    /**
     * プロジェクト更新機能（Admin）
     * @param \App\Services\AdminProject\UpdateProject\UpdateProjectParameter $parameter
     * @return \App\Models\Project
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
     * @return \App\Models\Project
     */
    public function findWithUsersAndAgentThroughApplicationOrAssignment(int $project_id): Project;

    /**
     * 応募できるプロジェクトを取得
     */
    public function fetchCanApply();


    /**
     * 応募終了処理
     * @param $project_id
     * @return \App\Models\Project
     */
    public function close($project_id): Project;

    /**
     * 応募開始処理
     * @param $project_id
     * @return \App\Models\Project
     */
    public function open($project_id): Project;
}
