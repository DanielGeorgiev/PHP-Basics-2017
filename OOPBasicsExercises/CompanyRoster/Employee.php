<?php

class Employee
{
    private $name;
    private $salary;
    private $position;
    private $department;
    private $email;
    private $age;

    function __construct($name, $salary, $position, $department, $email, $age)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->department = $department;
        $this->email = ($email !== '') ? $email : 'n/a';
        $this->age = ($age !== '') ? $age : '-1';
    }

    function __toString()
    {
        return "$this->name " . number_format($this->salary, 2) . " $this->email $this->age\n";
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function setDepartment($department)
    {
        $this->department = $department;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getAge(): string
    {
        return $this->age;
    }

    public function setAge(string $age)
    {
        $this->age = $age;
    }


}