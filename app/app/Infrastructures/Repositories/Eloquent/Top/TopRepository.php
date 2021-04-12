<?php

namespace App\Infrastructures\Repositories\Eloquent\Top;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Position;
use App\Models\Station;
use App\Services\Top\FetchTopDataRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TopRepository implements FetchTopDataRepositoryInterface
{
  /**
   * @inheritDoc 
   */
  public function all(): Collection
  {
    $Projects = Project::with('station')->with('position')->with('skill')->get();
    $Skills = Skill::all();
    $Positions = Position::all();
    $Stations = Station::all();
    $FetchTopData = [$Projects, $Skills, $Positions, $Stations];
    return $FetchTopData;
  }
}
