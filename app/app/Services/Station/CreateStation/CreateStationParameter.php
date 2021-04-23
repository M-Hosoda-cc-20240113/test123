<?php


namespace App\Services\Station\CreateStation;

use App\Models\Area;


class CreateStationParameter
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Area
     */
    private $area;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return \App\Services\Station\CreateStation\CreateStationParameter
     */
    public function setName(string $name): CreateStationParameter
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getArea(): string
    {
        return $this->area;
    }

    /**
     * @param string $area
     * @return \App\Services\Station\CreateStation\CreateStationParameter
     */
    public function setArea(string $area): CreateStationParameter
    {
        $this->area = $area;
        return $this;
    }
}
