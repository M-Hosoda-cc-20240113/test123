<?php

namespace App\Infrastructures\Repositories\Eloquent\Application;

use App\Models\Application;
use App\Services\Application\ApplicationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ApplicationRepository implements ApplicationRepositoryInterface
{
  /**
   * @inheritDoc 
   */
  public function all(): Collection
  {
    return Application::with()->with()->get();
  }
}
