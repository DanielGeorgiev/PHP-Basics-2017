<?php

interface IArea
{
    public function getArea();
}

class Circle implements IArea
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
}

class Rectangle implements IArea
{
    public $width;
    public $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea()
    {
        return
            $this->width * $this->height;
    }
}

$circ = new Circle(10);

echo "Circle, radius = $circ->radius mm, area = " . $circ->getArea() . " mm". PHP_EOL;

$rect = new Rectangle(15, 35);

echo "Rectangle, width = $rect->width mm, height = $rect->height mm, area = " . $rect->getArea() . " mm";
