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

$person1 = new Person('Petar', 20);
$person2 = new Person('Go6o', 39);
$person3 = new Person('Sa6k0o0', 14);

echo count(get_object_vars($person1));