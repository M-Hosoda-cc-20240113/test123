<?php


namespace App\Services\Agent\CreateAgent;


/**
 * Class CreateAgentParameter
 * @package App\Services\Agent\CreateAgent
 */
class CreateAgentParameter
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $tel;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CreateAgentParameter
     */
    public function setName(string $name): CreateAgentParameter
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getTel(): ?string
    {
        return $this->tel;
    }

    /**
     * @param string|null $tel
     * @return CreateAgentParameter
     */
    public function setTel(?string $tel): CreateAgentParameter
    {
        $this->tel = $tel;
        return $this;
    }

}
