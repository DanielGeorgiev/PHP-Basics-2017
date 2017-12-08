<?php
include 'Trainer.php';
include 'Pokemon.php';

$input = rtrim(fgets(STDIN));

$trainers = [];

while ($input !== 'Tournament') {
    $tokens = explode(' ', $input);

    $trainerName = $tokens[0];
    $pokemonName = $tokens[1];
    $element = $tokens[2];
    $pokemonHealth = $tokens[3];

    $currPokemon = new Pokemon($pokemonName, $element, $pokemonHealth);
    $currTrainer = new Trainer($trainerName, [$currPokemon]);

    if (isset($trainers[$trainerName])) {
        $trainers[$trainerName]->addPokemon($currPokemon);
    } else {
        $trainers[$trainerName] = $currTrainer;
    }

    $input = rtrim(fgets(STDIN));
}

$element = rtrim(fgets(STDIN));

while ($element !== 'End') {
    switch ($element) {
        case 'Fire':
        case 'Water':
        case 'Electricity':
            foreach ($trainers as $trainer) {
                $trainer->pokemonElementExists($element);
            }
            break;
    }

    $element = rtrim(fgets(STDIN));
}

usort($trainers, function ($trainer1, $trainer2){
    return $trainer1->getBadges() < $trainer2->getBadges();
});

foreach ($trainers as $trainer) {
    echo $trainer->getName() . " " . $trainer->getBadges() . " " . count($trainer->getPokemons()) . "\n";
}



