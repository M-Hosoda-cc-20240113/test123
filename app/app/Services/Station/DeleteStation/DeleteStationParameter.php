<?php


namespace App\Services\Station\DeleteStation;


class DeleteStationParameter
{
    /**
     * @var string
     */
    private $station_id;

    /**
     * @return string
     */
    public function getStationId(): string
    {
        return $this->station_id;
    }

    /**
     * @param string $station_id
     * @return DeleteStationParameter
     */
    public function setStationId(string $station_id): DeleteStationParameter
    {
        $this->station_id = $station_id;
        return $this;
    }
}
