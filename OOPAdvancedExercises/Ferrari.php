<?php

interface Car
{
    public function useBrakes();

    public function speedUp();
}

class Ferrari implements Car
{
    public static $objNum;

    private $model;
    private $driver;

    //--------------------
    public function __construct($model, $driver)
    {
        $this->model = $model;
        $this->driver = $driver;
        ++self::$objNum;
    }

    //--------------------
    public function getModel()
    {
        return $this->model;
    }

    public function getDriver()
    {
        return $this->driver;
    }

    //--------------------
    public function useBrakes()
    {
        return 'Brakes!';
    }

    public function speedUp()
    {
        return 'Zadu6avam sA!';
    }

    public static function forUrl(string $str, string $rep = '-')
    {
        return str_replace(' ', $rep, $str);
    }
}

$driver = rtrim(fgets(STDIN));

$f = new Ferrari('488-Spider', $driver);

echo $f::forUrl($f->getModel() . '/' . $f->useBrakes() . '/' . $f->speedUp()
    . '/' . strtolower($f->getDriver()) . '/' . PHP_EOL);
