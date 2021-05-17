<?php


namespace App\Services\Position\CreatePosition;


class CreatePositionParameter
{
    /**
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CreatePositionParameter
     */
    public function setName(string $name): CreatePositionParameter
    {
        $this->name = $name;
        return $this;
    }
}
