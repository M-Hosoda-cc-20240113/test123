<?php

namespace App\Services\Admin\Project;

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
}
