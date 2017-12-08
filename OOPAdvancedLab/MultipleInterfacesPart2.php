<?php

interface IArea
{
    public function getArea();
}

interface ICircumference
{
    public function getCircumference();
}

class Circle implements IArea, ICircumference
{
    public $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }


    public function getArea()
    {
        return
            $this->area = pi() * $this->radius * $this->radius;
    }

    public function getCircumference()
    {
        return
            pi() * 2 * $this->radius;
    }
}

$circ = new Circle(10);

echo "Circle with radius = $circ->radius mm:". PHP_EOL;
echo "Area = " . $circ->getArea() . PHP_EOL;
echo "Circumference = " . $circ->getCircumference();