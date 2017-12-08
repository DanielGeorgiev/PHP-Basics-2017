<?php
$input = str_replace(array("@", "%", "$", "*"),"",rtrim(fgets(STDIN)));

$dict = [];
$players = [];

while ($input != "Result"){
    $matches = [];
    preg_match_all('/([A-Z][a-z]+)|([A-Z]{2,200})|\b(\d{1,2}(?!\d)|100)\b/', $input, $matches);
    $team = $matches[0][0];
    $playerName = $matches[0][1];
    $points = $matches[0][2];

    $input = str_replace(array("@", "%", "$", "*"),"",rtrim(fgets(STDIN)));
}



class Player{
    private $name;
    private $points;

    function __construct($name, $points)
    {
        $this->name = $name;
        $this->points = $points;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function setPoints($points)
    {
        $this->points = $points;
    }


}