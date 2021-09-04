<?php

namespace App\Services\User\UpdateUser;

use App\Models\User;

/**
 * Class UpdateUserParameter
 * @package App\Services\User\EditUser
 */
class UpdateUserParameter
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var string
     */
    private $sei;

    /**
     * @var string
     */
    private $sei_kana;

    /**
     * @var string
     */
    private $mei;

    /**
     * @var string
     */
    private $mei_kana;

    /**
     * @var int
     */
    private $tel;

    /**
     * @var int
     */
    private $birthday;

    /**
     * @var string|null
     */
    private $contact_time;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return UpdateUserParameter
     */
    public function setUser(User $user): UpdateUserParameter
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getSei(): string
    {
        return $this->sei;
    }

    /**
     * @param string $sei
     * @return UpdateUserParameter
     */
    public function setSei(string $sei): UpdateUserParameter
    {
        $this->sei = $sei;
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
     * @return UpdateUserParameter
     */
    public function setSeiKana(string $sei_kana): UpdateUserParameter
    {
        $this->sei_kana = $sei_kana;
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
     * @return UpdateUserParameter
     */
    public function setMei(string $mei): UpdateUserParameter
    {
        $this->mei = $mei;
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
     * @return UpdateUserParameter
     */
    public function setMeiKana(string $mei_kana): UpdateUserParameter
    {
        $this->mei_kana = $mei_kana;
        return $this;
    }

    /**
     * @return int
     */
    public function getTel(): int
    {
        return $this->tel;
    }

    /**
     * @param int $tel
     * @return UpdateUserParameter
     */
    public function setTel(int $tel): UpdateUserParameter
    {
        $this->tel = $tel;
        return $this;
    }

    /**
     * @return int
     */
    public function getBirthday(): int
    {
        return $this->birthday;
    }

    /**
     * @param int $birthday
     * @return UpdateUserParameter
     */
    public function setBirthday(int $birthday): UpdateUserParameter
    {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContactTime(): ?string
    {
        return $this->contact_time;
    }

    /**
     * @param string|null $contact_time
     * @return UpdateUserParameter
     */
    public function setContactTime(?string $contact_time): UpdateUserParameter
    {
        $this->contact_time = $contact_time;
        return $this;
    }
}
