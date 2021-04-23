<?php


namespace App\Services\Agent\CreateAgent;


class CreateAgentParameter
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
     */
    public function setName(string $name): CreateAgentParameter
    {
        $this->name = $name;
        return $this;
    }
}
