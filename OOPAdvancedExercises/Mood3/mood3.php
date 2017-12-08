<?php
include 'CharacterInterface.php';
include 'Archangel.php';
include 'Demon.php';

class Factory
{
    public function makeCharacter($class, $username, $specialPower, $level)
    {
        return new $class($username, $specialPower, $level);
    }
}

$input = explode(' | ', rtrim(fgets(STDIN)));

$factory = new Factory();

$character = $factory->makeCharacter($input[1], $input[0], $input[2], $input[3]);

echo '"' . $character->getUsername() . '" | "' . $character->getHashedPassword() . '" -> ' . $input[1] . PHP_EOL;
echo $character->getTotalPower();


