<?php


namespace App\Services\Position\DeletePosition;


class DeletePositionParameter
{
    /**
     * @var string
     */
    private $position_id;

    /**
     * @return string
     */
    public function getPositionId(): string
    {
        return $this->position_id;
    }

    /**
     * @param int|string $position_id
     * @return DeletePositionParameter
     */
    public function setPositionId($position_id): DeletePositionParameter
    {
        $this->position_id = $position_id;
        return $this;
    }
}
