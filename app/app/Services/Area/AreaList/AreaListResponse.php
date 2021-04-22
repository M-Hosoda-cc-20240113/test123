<?php


namespace App\Services\Area\AreaList;

use App\Models\Area;
use Illuminate\Support\Collection;

class AreaListResponse
{
    /**
     * @var Area[]
     */
    private $areas;

    /**
     * @return Area[]
     */
    public function getAreas()
    {
        return $this->areas;
    }

    /**
     * @param mixed $areas
     */
    public function setAreas(Collection $areas)
    {
        $this->areas = $areas;

        return $this;
    }
}
