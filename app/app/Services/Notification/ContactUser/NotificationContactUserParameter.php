<?php


namespace App\Services\Notification\ContactUser;


class NotificationContactUserParameter
{
    /**
     * @var string
     */
    private $sei;

    /**
     * @var string
     */
    private $mei;

    /**
     * @var string
     */
    private $sei_kana;

    /**
     * @var string
     */
    private $mei_kana;

    /**
     * @var string
     */
    private $tel;

    /**
     * @var string
     */
    private $email;

    /**
     * @return string
     */
    public function getSei(): string
    {
        return $this->sei;
    }

    /**
     * @param string $sei
     * @return NotificationContactUserParameter
     */
    public function setSei(string $sei): NotificationContactUserParameter
    {
        $this->sei = $sei;
        return $this;
    }

    /**
     * @return string
     */
    public function getMei(): string
    {
        return $this->mei;
    }

    /**
     * @param string $mei
     * @return NotificationContactUserParameter
     */
    public function setMei(string $mei): NotificationContactUserParameter
    {
        $this->mei = $mei;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeiKana(): string
    {
        return $this->sei_kana;
    }

    /**
     * @param string $sei_kana
     * @return NotificationContactUserParameter
     */
    public function setSeiKana(string $sei_kana): NotificationContactUserParameter
    {
        $this->sei_kana = $sei_kana;
        return $this;
    }

    /**
     * @return string
     */
    public function getMeiKana(): string
    {
        return $this->mei_kana;
    }

    /**
     * @param string $mei_kana
     * @return NotificationContactUserParameter
     */
    public function setMeiKana(string $mei_kana): NotificationContactUserParameter
    {
        $this->mei_kana = $mei_kana;
        return $this;
    }

    /**
     * @return string
     */
    public function getTel(): string
    {
        return $this->tel;
    }

    /**
     * @param string $tel
     * @return NotificationContactUserParameter
     */
    public function setTel(string $tel): NotificationContactUserParameter
    {
        $this->tel = $tel;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return NotificationContactUserParameter
     */
    public function setEmail(string $email): NotificationContactUserParameter
    {
        $this->email = $email;
        return $this;
    }
}
