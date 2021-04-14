<?php

namespace App\Infrastructures\Repositories\Eloquent\Application;

use App\Models\Application;
use App\Models\User;
use App\Services\Application\ApplicationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use function PHPUnit\Framework\isEmpty;

class ApplicationRepository implements ApplicationRepositoryInterface
{
  /**
   * @inheritDoc
   */
  public function all(): Collection
  {
      return User::with('project_app')
          ->whereHas('project_app',function($q){
          $q->whereExists(function($q){
             return $q;
          });
      })->get();
  }
}
