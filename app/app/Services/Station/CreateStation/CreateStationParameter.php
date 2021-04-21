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
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Area
     */
    public function getArea(): Area
    {
        return $this->area;
    }

    /**
     * @param Area $area
     */
    public function setArea(Area $area): void
    {
        $this->area = $area;
    }
}
