<?php

interface CharacterInterface
{
    public function getUsername();
    public function setUsername($username);

    public function getHashedPassword();
    public function setHashedPassword();

    public function getLevel();
    public function setLevel($level);

    public function setSpecialPower($specialPower);

    public function getTotalPower();
}