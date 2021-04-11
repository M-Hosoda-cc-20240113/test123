<?php

namespace App\Services\Project;

use App\Models\Project;

interface ProjectRepositoryInterface
{
  public function all();

  /**
   * プロジェクト新規登録
   * @return Project
   * 
   */
  public function create(): Project;

  /**
   * プロジェクト詳細
   * @return Project
   * 
   */
   public function detail(int $id): Project;
}
