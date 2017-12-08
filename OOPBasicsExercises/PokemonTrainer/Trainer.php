<?php

class Trainer
{
    private $name;
    private $badges;
    private $pokemons;

    function __construct(string $name, array $pokemons)
    {
        $this->name = $name;
        $this->pokemons = $pokemons;
        $this->badges = 0;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBadges(): int
    {
        return $this->badges;
    }

    public function getPokemons(): array
    {
        return $this->pokemons;
    }

    public function addPokemon($pokemon){
        $this->pokemons[] = $pokemon;
    }

    public function pokemonElementExists(string $element){
        $exists = false;

        foreach ($this->pokemons as $pokemon) {
            if ($pokemon->getElement() === $element){
                $this->badges += 1;
                $exists = true;
                break;
            }
        }

        if (!$exists){
            foreach ($this->pokemons as $index => $pokemon) {
                $pokemon->setHealth($pokemon->getHealth() - 10);

                if ($pokemon->getHealth() <= 0){
                    unset($this->pokemons[$index]);
                }
            }
        }
    }
}