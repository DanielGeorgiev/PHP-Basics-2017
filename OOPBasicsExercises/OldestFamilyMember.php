<?php

class Person
{
    private $name;
    private $age;

    function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }
}

class Family
{
    private $people;


    public function getPeople()
    {
        return $this->people;
    }

    public function setPeople($people)
    {
        $this->people = $people;
    }


    function addMember(Person $person){
        $this->people[] = $person;
    }

    function getOldestMember(){
        $maxAge = -1;
        $oldestMember = 0;

        foreach ($this->people as $person) {
            if ($person->getAge() > $maxAge){
                $maxAge = $person->getAge();
                $oldestMember = $person;
            }
        }

        return $oldestMember;
    }
}

$n = intval(rtrim(fgets(STDIN)));

$family = new Family();

for ($i = 0; $i < $n; $i++){
    $input = explode(' ', rtrim(fgets(STDIN)));
    $personName = $input[0];
    $personAge = $input[1];

    $currPerson = new Person($personName, intval($personAge));
    $family->addMember($currPerson);
}

$oldestMember = $family->getOldestMember();
echo $oldestMember->getName() . ' ' . $oldestMember->getAge();
