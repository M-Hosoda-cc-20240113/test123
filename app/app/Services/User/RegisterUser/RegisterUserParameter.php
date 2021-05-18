<?php


namespace App\Services\User\RegisterUser;


class RegisterUserParameter
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
    private $birthday;

    /**
     * @var string
     */
    private $tel;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @return string
     */
    public function getSei(): string
    {
        return $this->sei;
    }

    /**
     * @param string $sei
     * @return RegisterUserParameter
     */
    public function setSei(string $sei): RegisterUserParameter
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
     * @return RegisterUserParameter
     */
    public function setMei(string $mei): RegisterUserParameter
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
     * @return RegisterUserParameter
     */
    public function setSeiKana(string $sei_kana): RegisterUserParameter
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
     * @return RegisterUserParameter
     */
    public function setMeiKana(string $mei_kana): RegisterUserParameter
    {
        $this->mei_kana = $mei_kana;
        return $this;
    }

    /**
     * @return string
     */
    public function getBirthday(): string
    {
        return $this->birthday;
    }

    /**
     * @param string $birthday
     * @return RegisterUserParameter
     */
    public function setBirthday(string $birthday): RegisterUserParameter
    {
        $this->birthday = $birthday;
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
     * @return RegisterUserParameter
     */
    public function setTel(string $tel): RegisterUserParameter
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
     * @return RegisterUserParameter
     */
    public function setEmail(string $email): RegisterUserParameter
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return RegisterUserParameter
     */
    public function setPassword(string $password): RegisterUserParameter
    {
        $this->password = $password;
        return $this;
    }
}
