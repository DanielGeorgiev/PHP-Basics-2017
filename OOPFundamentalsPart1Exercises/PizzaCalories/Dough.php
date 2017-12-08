<?php

class Dough
{
    private $type;
    private $bakingTechnique;
    private $weight;

    //C-or
    public function __construct($type, $bakingTechnique, $weight)
    {
        $this->setType($type);
        $this->setBakingTechnique($bakingTechnique);
        $this->setWeight($weight);
    }

    //G, S
    private function setType($type)
    {
        if (strtolower($type) !== 'white' && strtolower($type) !== 'wholegrain') {
            throw new Exception('Invalid type of dough.');
        } else {
            $this->type = $type;
        }
    }

    private function setBakingTechnique($bakingTechnique)
    {
        if (strtolower($bakingTechnique) !== 'crispy' &&
            strtolower($bakingTechnique) !== 'chewy' &&
            strtolower($bakingTechnique) !== 'homemade'
        ) {
            throw new Exception('Invalid type of dough.');
        } else {
            $this->bakingTechnique = $bakingTechnique;
        }
    }

    private function setWeight($weight)
    {
        if ($weight >= 1 && $weight <= 200) {
            $this->weight = $weight;
        } else{
            throw new Exception("Dough weight should be in the range[1..200].");
        }
    }


    //Methods
    public function getCalories()
    {
        $calories = $this->weight * 2;

        switch (strtolower($this->type)) {
            case 'white':
                $calories *= 1.5;
                break;
        }

        switch (strtolower($this->bakingTechnique)) {
            case 'crispy':
                $calories *= 0.9;
                break;
            case 'chewy':
                $calories *= 1.1;
                break;
        }

        return $calories;
    }
}