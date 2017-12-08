<?php

class Person
{
    private $name;
    private $money;
    private $products;


    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setMoney($money);
        $this->products = [];
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

    public function getMoney(): float
    {
        return $this->money;
    }

    public function setMoney(float $money)
    {
        if ($money >= 0){
            $this->money = $money;
        }else{
            throw new Exception('Money cannot be negative');
        }
    }

    public function getProducts(): array
    {
        return $this->products;
    }


    //Methods
    private function isValid(string $string){
        return trim($string) !== '';
    }

    public function addToProducts(Product $product){
        if ($product->getPrice() <= $this->money){
            $this->products[] = $product;
            $this->money -= $product->getPrice();
        }else{
            throw new Exception($this->name . ' can\'t afford ' . $product->getName());
        }
    }
}