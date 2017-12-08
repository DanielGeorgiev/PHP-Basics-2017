<?php

class Archangel implements CharacterInterface
{
    private $username;
    private $hashedPassword;
    private $level;
    private $specialPower;


    public function __construct($username, $level, $specialPower)
    {
        $this->setUsername($username);
        $this->setHashedPassword();
        $this->setLevel($level);
        $this->setSpecialPower($specialPower);
    }


    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        if (mb_strlen($username) <= 10) {
            $this->username = $username;
        }
    }

    public function getHashedPassword()
    {
        return $this->hashedPassword;
    }

    public function setHashedPassword()
    {
        $this->hashedPassword = strrev($this->username) . mb_strlen($this->username) * 21;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function setSpecialPower($specialPower)
    {
        return $this->specialPower = $specialPower;
    }

    public function getSpecialPower()
    {
        return $this->specialPower;
    }

    public function getTotalPower()
    {
        return $this->getSpecialPower() * $this->level;
    }
}