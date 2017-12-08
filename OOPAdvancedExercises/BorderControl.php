<?php

interface LegitDystopian
{
    public function checkId($specificId);
}

class Citizen implements LegitDystopian
{
    private $name;
    private $age;
    private $id;

    public function __construct($name, $age, $id)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getId()
    {
        return $this->id;
    }

    public function checkId($specificId)
    {
        if (preg_match('/\b\d+' . $specificId . '\b/', $this->id)){
            return false;
        }

        return true;
    }
}

class Robot implements LegitDystopian
{
    private $model;
    private $id;

    public function __construct($model, $id)
    {
        $this->model = $model;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function checkId($specificId)
    {
        if (preg_match('/\b\d+' . $specificId . '\b/', $this->id)){
            return false;
        }

        return true;
    }
}

$input = rtrim(fgets(STDIN));

$dystopians = [];

while ($input !== 'End'){
    $tokens = explode(' ', $input);

    if (count($tokens) === 2){
        $currRobot = new Robot($tokens[0], $tokens[1]);
        $dystopians[] = $currRobot;
    }else if (count($tokens) === 3){
        $currCitizen = new Citizen($tokens[0], $tokens[1], $tokens[2]);
        $dystopians[] = $currCitizen;
    }

    $input = rtrim(fgets(STDIN));
}

$specificId = rtrim(fgets(STDIN));

$fakeDystopians = [];
foreach ($dystopians as $dystopian) {
    if ($dystopian -> checkId($specificId) === false){
        $fakeDystopians[] = $dystopian;
    }
}

foreach ($fakeDystopians as $fakeDystopian) {
    echo $fakeDystopian->getId() . PHP_EOL;
}