<?php

class Cargo
{
    public $weight;
    public $type;

    public function __construct(int $weight, string $type)
    {
        $this->weight = $weight;
        $this->type = $type;
    }
}