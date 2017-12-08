<?php

class Person
{
    protected $name;
    protected $age;

    public function __construct($name, $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    protected function setName($name)
    {
        if (strlen($name) >= 3) {
            $this->name = $name;
        } else {
            throw new Exception('Name’s length should not be less than 3 symbols!');
        }
    }

    protected function setAge($age)
    {
        if ($age <= 0) {
            throw new Exception('Age must be positive!');
        } else {
            $this->age = $age;
        }
    }
}

class Child extends Person
{
    public function __construct($name, $age)
    {
        parent::__construct($name, $age);
    }

    protected function setAge($age)
    {
        if ($age >= 1 && $age <= 15) {
            $this->age = $age;
        } else {
            throw new Exception('Child’s age must be less than 16!');
        }
    }
}



