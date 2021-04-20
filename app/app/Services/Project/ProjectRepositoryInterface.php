<?php

namespace App\Services\Project;

use App\Models\Project;
use Illuminate\Support\Collection;

interface ProjectRepositoryInterface
{
    public function all();

    /**
     * プロジェクト新規登録（Admin）
     * @return Project
     *
     */
    public function create(): Project;

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
     * @return \App\Models\Project
     */
    public function fetchCanApply();
}
