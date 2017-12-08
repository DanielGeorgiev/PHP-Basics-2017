<?php

interface PersonInterface
{
    public function setName(string $name);

    public function setAge(int $age);
}

interface Identifiable
{
    public function setId(float $id);
}

interface Birthable
{
    public function setBirthdate(string $birthDate);
}

class Citizen implements PersonInterface, Identifiable, Birthable
{
    private $name;
    private $age;
    private $id;
    private $birthDate;

    public function __construct($name, $age, $id, $birthDate)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthdate($birthDate);
    }


    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function setId(float $id)
    {
        $this->id = $id;
    }

    public function setBirthdate(string $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function __toString()
    {
        return "$this->name \n $this->age \n $this->id \n $this->birthDate";
    }
}

$myCitizen = new Citizen(rtrim(fgets(STDIN)), intval(rtrim(fgets(STDIN))),
floatval(rtrim(fgets(STDIN))), rtrim(fgets(STDIN)));
echo $myCitizen;