<?php


class FoodFactory
{
    public function makeFood($name){
        return new Food($name);
    }
}

class MoodFactory
{
    public function makeMood($happinessPoints){
        return new Mood($happinessPoints);
    }
}

class Food
{
    private $name;
    private $happinessPoints;

    public function __construct(string $name)
    {
        $this->name = $name;

        switch (strtolower($name)) {
            case 'cram':
                $this->happinessPoints = 2;
                break;
            case 'lembas':
                $this->happinessPoints = 3;
                break;
            case 'apple':
                $this->happinessPoints = 1;
                break;
            case 'melon':
                $this->happinessPoints = 1;
                break;
            case 'honeycake':
                $this->happinessPoints = 5;
                break;
            case 'mushrooms':
                $this->happinessPoints = -10;
                break;
            default:
                $this->happinessPoints = -1;
                break;
        }
    }

    public function getHappinessPoints()
    {
        return $this->happinessPoints;
    }
}

class Mood
{
    private $happinessPoints;
    private $mood;

    public function __construct($happinessPoints)
    {
        $this->happinessPoints = $happinessPoints;
        if ($happinessPoints < -5){
            $this->mood = 'Angry';
        }else if ($happinessPoints >= -5 && $happinessPoints < 0){
            $this->mood = 'Sad';
        }else if ($happinessPoints >= 0 && $happinessPoints <= 15){
            $this->mood = 'Happy';
        }else{
            $this->mood = 'PHP';
        }
    }

    public function getMood(){
        return $this->mood;
    }
}

$input = explode(',', rtrim(fgets(STDIN)));

$foods = [];
for ($i = 0; $i < count($input); $i++){
    $foodName = $input[$i];
    $foodFactory = new FoodFactory();
    $currFood = $foodFactory->makeFood($foodName);

    $foods[] = $currFood;
}

$totalPoints = array_reduce($foods, function ($totalPoints, $food){
    return $totalPoints += $food->getHappinessPoints();
});

$moodFactory = new MoodFactory();
$currMood = $moodFactory->makeMood($totalPoints);

echo $totalPoints . PHP_EOL;
echo $currMood->getMood();
