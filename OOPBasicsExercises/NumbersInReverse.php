<?php

class FloatNumber{
    private $float;

    function __construct(string $number)
    {
        $this->float = $number;
    }

    function getNumber(){
        return $this->float;
    }

    function printInReverse(){
        $reversedN = 0.0;
        $number = $this->float;

        if ($number[0] == '-'){
            $number = str_replace('-', '', $number);
            $reversedN = '-' . strrev($number);
        }else{
            $reversedN = strrev($number);
        }

        echo $reversedN;
    }
}

$number = new FloatNumber(rtrim(fgets(STDIN)));
$number->printInReverse();