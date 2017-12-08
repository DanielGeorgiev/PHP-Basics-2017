<?php

abstract class Food
{
    protected $quantity;


    public function __construct($quantity)
    {
        $this->quantity = $quantity;
    }


    public function getQuantity()
    {
        return $this->quantity;
    }
}

abstract class Animal
{
    protected $type;
    protected $name;
    protected $livingRegion;
    protected $weight;
    protected $foodEaten;


    public function __construct($type, $name, $weight, $livingRegion)
    {
        $this->type = $type;
        $this->name = $name;
        $this->livingRegion = $livingRegion;
        $this->weight = $weight;
        $this->foodEaten = 0;
    }


    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLivingRegion()
    {
        return $this->livingRegion;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getFoodEaten()
    {
        return $this->foodEaten;
    }


    abstract public function makeSound();

    abstract public function eat(Food $food);
}

class Vegetable extends Food
{

}

class Meat extends Food
{

}

class Mouse extends Animal
{
    public function makeSound()
    {
        echo 'SQUEEEAAAK!' . PHP_EOL;
    }

    public function eat(Food $food)
    {
        if (get_class($food) === 'Vegetable') {
            $this->foodEaten += $food->getQuantity();
        } else {
            echo "Mouses are not eating that type of food!\n";
        }
    }
}

class Zebra extends Animal
{
    public function makeSound()
    {
        echo 'Zs!' . PHP_EOL;
    }

    public function eat(Food $food)
    {
        if (get_class($food) === 'Vegetable') {
            $this->foodEaten += $food->getQuantity();
        } else {
            echo "Zebras are not eating that type of food!\n";
        }
    }
}

class Tiger extends Animal
{
    public function makeSound()
    {
        echo 'ROAAAR!!' . PHP_EOL;
    }

    public function eat(Food $food)
    {
        if (get_class($food) === 'Meat') {
            $this->foodEaten += $food->getQuantity();
        } else {
            echo "Tigers are not eating that type of food!\n";
        }
    }
}

class Cat extends Animal
{
    private $breed;

    public function __construct($type, $name, $weight, $livingRegion, $breed)
    {
        parent::__construct($type, $name, $weight, $livingRegion);
        $this->breed = $breed;
    }


    public function getBreed()
    {
        return $this->breed;
    }


    public function makeSound()
    {
        echo 'Meooow!' . PHP_EOL;
    }

    public function eat(Food $food)
    {
        $this->foodEaten += $food->getQuantity();
    }
}

$animalInput = rtrim(fgets(STDIN));

while ($animalInput !== 'End') {
    $tokens = explode(' ', $animalInput);

    $animalType = $tokens[0];
    $name = $tokens[1];
    $weight = $tokens[2];
    $livingRegion = $tokens[3];
    $breed = (isset($tokens[4])) ? $tokens[4] : false;

    $foodInput = explode(' ', rtrim(fgets(STDIN)));
    $foodType = $foodInput[0];
    $quantity = $foodInput[1];

    $animal = null;

    if ($animalType !== 'Cat') {
        $animal = new $animalType($animalType, $name, $weight, $livingRegion);
    }else{
        $animal = new $animalType($animalType, $name, $weight, $livingRegion, $breed);
    }

    $food = new $foodType($quantity);

    echo $animal->makeSound();
    $animal->eat($food);
    $print = ($animalType === 'Cat') ? $animal->getType() . '['
        . $animal->getName() . ', ' .  $animal->getBreed() . ', ' . (float)$animal->getWeight()
        . ', ' . $animal->getLivingRegion() . ', ' . $animal->getFoodEaten() . ']' : $animal->getType() . '['
        . $animal->getName() . ', ' . (float)$animal->getWeight()
        . ', ' . $animal->getLivingRegion() . ', ' . $animal->getFoodEaten() . ']';
    echo $print . PHP_EOL;

    $animalInput = rtrim(fgets(STDIN));
}