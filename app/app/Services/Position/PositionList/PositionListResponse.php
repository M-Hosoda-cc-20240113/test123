<?php

namespace App\Services\Position\PositionList;

use App\Models\Position;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class PositionListResponse
{
    /**
     * @var LengthAwarePaginator
     */
    private $positions;

    /**
     * Get the value of positions
     *
     * @return LengthAwarePaginator
     */
    public function getPositions(): LengthAwarePaginator
    {
        return $this->positions;
    }

    /**
     * Set the value of positions
     * @param LengthAwarePaginator $positions
     * @return PositionListResponse
     */
    public function setPositions(LengthAwarePaginator $positions): PositionListResponse
    {
        $this->positions = $positions;
        return $this;
    }
}
