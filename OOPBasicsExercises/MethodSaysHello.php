<?php

class Person
{
    private $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function greeting()
    {
        echo "$this->name says \"Hello\"!";
    }
}

$name = rtrim(fgets(STDIN));

$person = new Person($name);
$person->greeting();