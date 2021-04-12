<?php

namespace App\Services\Top\FetchTopResponse;

use Illuminate\Support\Collection;

class FetchTopResponse
{
  /**
   * @var Project[]
   * @var Skill[]
   * @var Position[]
   * @var Station[]
   */
  private $featch_top_datas;

  /**
   * @var Project[]
   * @var Skill[]
   * @var Position[]
   * @var Station[]
   */
  public function getTopdatas()
  {
    return $this->featch_top_datas;
  }

  /**
   * @var Project[]
   * @var Skill[]
   * @var Position[]
   * @var Station[]
   *
   * @return  self
   */ 
  public function getTopdatas(Collection $featch_top_datas)
  {
    $this->featch_top_datas = $featch_top_datas;

    return $this;
  }
}
