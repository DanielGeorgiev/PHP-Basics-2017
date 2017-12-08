<?php

class Pizza
{
    private $name;
    private $numberToppings;
    private $toppings;
    private $dough;

    //C-or
    public function __construct($name, $numberToppings)
    {
        $this->setName($name);
        $this->setNumberToppings($numberToppings);
    }

    //G,S
    public function getName(){
        return $this->name;
    }

    public function setName($name)
    {
        if ($this->isValidStr($name) && (strlen($name) >= 1 && strlen($name) <= 15)) {
            $this->name = $name;
        }else{
            throw new Exception('Pizza name should be between 1 and 15 symbols.');
        }
    }

    public function setDough($dough)
    {
        $this->dough = $dough;
    }

    public function getNumberToppings(){
        return $this->numberToppings;
    }

    public function setNumberToppings($numberToppings){
        if ($numberToppings >= 0 && $numberToppings <= 10){
            $this->numberToppings = $numberToppings;
        }else{
            throw new Exception('Number of toppings should be in range [0..10].');
        }
    }

    //Methods
    public function isValidStr($string)
    {
        return trim($string) !== '';
    }

    public function getTotalCalories(){
        $totalCalories = $this->dough->getCalories();

        foreach ($this->toppings as $topping) {
            $totalCalories += $topping->getCalories();
        }

        return $totalCalories;
    }

    public function addTopping(Topping $topping){
        $this->toppings[] = $topping;
    }
}