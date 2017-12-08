<?php

class Engine
{
    public $speed;
    public $power;

    public function __construct(int $speed, int $power)
    {
        $this->speed = $speed;
        $this->power = $power;
    }
}