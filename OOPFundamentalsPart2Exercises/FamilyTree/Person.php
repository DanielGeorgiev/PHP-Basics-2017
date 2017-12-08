<?php

abstract class Person
{
    protected $name;
    protected $yearDead;
    protected $yearBirth;

    public function __construct(string $name, int $yearBirth, int $yearDead)
    {
        $this->setName($name);
        $this->setYearBirth($yearBirth);
        $this->setYearDead($yearDead);
    }

    public function getName(): string
    {
        return $this->name;
    }

    protected function setName($name)
    {
        if (mb_strlen($name) >= 3) {
            $this->name = $name;
        } else {
            throw new Exception('Name’s length should not be less than 3 symbols!');
        }
    }

    public function getYearBirth(): int
    {
        return $this->yearBirth;
    }

    protected function setYearBirth(int $yearBirth)
    {
        $this->yearBirth = $yearBirth;
    }

    public function getYearDead(): int
    {
        return $this->yearDead;
    }

    protected function setYearDead(int $yearDead)
    {
        $this->yearDead = $yearDead;
    }

    //Methods
    public function getTimeLived(){
        return $this->yearDead - $this->yearBirth;
    }

    abstract public function getGenerationNum();
}