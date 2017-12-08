<?php

interface DystopianInterface
{
    public function checkId($specificId);
}

interface BirthableInterface
{
    public function isBirthday($year);
}

class Citizen implements DystopianInterface, BirthableInterface
{
    private $name;
    private $age;
    private $id;
    private $birthDate;

    public function __construct($name, $age, $id, $birthDate)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
        $this->birthDate = $birthDate;
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

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function checkId($specificId)
    {
        if (preg_match('/\b\d+' . $specificId . '\b/', $this->id)) {
            return false;
        }

        return true;
    }

    public function isBirthday($year)
    {
        return $year === substr($this->birthDate, 6, 4);
    }
}

class Robot implements DystopianInterface
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
        if (preg_match('/\b\d+' . $specificId . '\b/', $this->id)) {
            return false;
        }

        return true;
    }
}

class Pet implements BirthableInterface
{
    private $name;
    private $birthDate;

    public function __construct($name, $birthDate)
    {
        $this->name = $name;
        $this->birthDate = $birthDate;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function isBirthday($year)
    {
        return $year === substr($this->birthDate, 6, 4);
    }
}

$input = rtrim(fgets(STDIN));

$objects = [];

while ($input != 'End') {
    $tokens = explode(' ', $input);

    switch ($tokens[0]) {
        case 'Citizen':
            $currObj = new Citizen($tokens[1], $tokens[2], $tokens[3], $tokens[4]);
            $objects[] = $currObj;
            break;
        case 'Pet':
            $currObj = new Pet($tokens[1], $tokens[2]);
            $objects[] = $currObj;
            break;
    }

    $input = rtrim(fgets(STDIN));
}

$birthdays = [];
$year = rtrim(fgets(STDIN));

foreach ($objects as $object) {
    if ($object->isBirthday($year)){
        $birthdays[] = $object->getBirthDate();
    }
}

if (count($birthdays) === 0){
    echo "<no output>";
}else{
    foreach ($birthdays as $birthday) {
        echo $birthday . PHP_EOL;
    }
}