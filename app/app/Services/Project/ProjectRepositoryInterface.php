<?php

namespace App\Services\Project;

use App\Models\Project;

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
    public function find(int $project_id): Project;

    /**
     * プロジェクト詳細（Admin）
     * @param int $project_id
     * @return \App\Models\Project
     */
    public function findWithAgent(int $project_id): Project;
}
