<?php

class Topping
{
    private $type;
    private $weight;

    //C-or
    public function __construct($type, $weight)
    {
        $this->setType($type);
        $this->setWeight($weight);
    }

    //G,S
    private function setType($type)
    {
        if (strtolower($type) !== 'meat'
            && strtolower($type) !== 'veggies'
            && strtolower($type) !== 'cheese'
            && strtolower($type) !== 'sauce'
        ) {
            throw new Exception("Cannot place $type on top of your pizza.");
        } else {
            $this->type = $type;
        }
    }

    private function setWeight($weight)
    {
        if ($weight >= 1 && $weight <= 50) {
            $this->weight = $weight;
        } else {
            throw new Exception("$this->type weight should be in the range[1..50].");
        }
    }

    //Methods
    public function getCalories()
    {
        $calories = $this->weight * 2;

        switch (strtolower($this->type)) {
            case 'meat':
                $calories *= 1.2;
                break;
            case 'veggies':
                $calories *= 0.8;
                break;
            case 'cheese':
                $calories *= 1.1;
                break;
            case 'sauce':
                $calories *= 0.9;
                break;
        }

        return $calories;
    }
}
