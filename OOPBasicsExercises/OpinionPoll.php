<?php

class Person
{
    public $name;
    public $age;

    function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

$lines = intval(rtrim(fgets(STDIN)));
$persons = [];

for ($i = 0; $i < $lines; $i++){
    $input = explode(' ', rtrim(fgets(STDIN)));
    $name = $input[0];
    $age = $input[1];

    $person = new Person($name, $age);

    $persons[] = $person;
}

$filteredP = array_filter($persons, function ($currP){
    return $currP->age > 30;
});

usort($filteredP, function ($currP1, $currP2){
    return strcmp($currP1->name, $currP2->name);
});

foreach ($filteredP as $person) {
    echo $person->name . ' - ' . $person->age . "\n";
}
