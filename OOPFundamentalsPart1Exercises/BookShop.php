<?php

class Book
{
    protected $title;
    protected $author;
    protected $price;


    public function __construct($title, $author, $price)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    //G,S
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        if (strlen($title) < 3) {
            throw new Exception('Title not valid!');
        } else {
            $this->title = $title;
        }
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $tokens = explode(' ', $author);
        if (is_numeric($tokens[1][0])) {
            throw new Exception('Author not valid!');
        } else {
            $this->author = $author;
        }
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        if ($price <= 0) {
            throw new Exception('Price not valid!');
        } else {
            $this->price = $price;
        }
    }


    //Methods
}

class GoldenEditionBook extends Book
{
    public function __construct($title, $author, $price)
    {
        parent::__construct($title, $author, $price + ($price * 30/100));
    }
}

try{
    $author = rtrim(fgets(STDIN));
    $bookTitle = rtrim(fgets(STDIN));
    $price = floatval(rtrim(fgets(STDIN)));
    $type = rtrim(fgets(STDIN));

    $book = 0;

    if ($type === 'STANDARD'){
        $book = new Book($bookTitle, $author, $price);
    }else if ($type === 'GOLD'){
        $book = new GoldenEditionBook($bookTitle, $author, $price);
    }else{
        throw new Exception('Type is not valid!');
    }
    echo 'OK' . PHP_EOL;
    echo $book->getPrice();

} catch (Exception $exception){
    echo $exception->getMessage() . PHP_EOL;
}
