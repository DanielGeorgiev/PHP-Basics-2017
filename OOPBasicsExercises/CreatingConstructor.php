<?php

class Person
{
    public $name;
    public $age;

    function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;

        echo $this->name . ' ' . $this->age . "\n";
    }
}

$name = rtrim(fgets(STDIN));
$age = rtrim(fgets(STDIN));
$person = new Person($name, $age);

