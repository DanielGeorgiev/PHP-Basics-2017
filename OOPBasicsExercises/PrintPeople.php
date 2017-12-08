<?php

class Person
{
    private $name;
    private $age;
    private $occupation;

    public function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    function __toString()
    {
        return "$this->name - age: $this->age, occupation: $this->occupation";
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getAge(): int
    {
        return $this->age;
    }

    public function getOccupation(): string
    {
        return $this->occupation;
    }
}

$input = rtrim(fgets(STDIN));

while ($input !== 'END'){
    $tokens = explode(' ', $input);
    $name = $tokens[0];
    $age = $tokens[1];
    $occupation = $tokens[2];

    $person = new Person($name, $age, $occupation);

    $persons[] = $person;

    $input = rtrim(fgets(STDIN));
}

usort($persons, function ($p1, $p2){
    return $p1->getAge() > $p2->getAge();
});

foreach ($persons as $person) {
    echo $person . "\n";
}

