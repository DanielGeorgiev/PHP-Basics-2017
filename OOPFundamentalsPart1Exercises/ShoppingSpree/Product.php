<?php

class Product
{
    private $name;
    private $price;

    function __construct(string $name, float $price)
    {
        $this->setName($name);
        $this->setPrice($price);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        if ($this->isValid($name)){
            $this->name = $name;
        }else{
            throw new Exception('Name cannot be empty');
        }
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price)
    {
        if ($price >= 0){
            $this->price = $price;
        }else{
            throw new Exception('Price cannot be negative');
        }
    }


    //Methods
    private function isValid(string $string){
        return trim($string) !== '';
    }
}