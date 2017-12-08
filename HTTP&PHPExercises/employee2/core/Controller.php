<?php

abstract class Controller
{

    protected $db = null;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    abstract public function main();

    public function __call($fName, $args)
    {
        $this->loadView('view/error.php');
    }

    protected function loadView($view, $objects = [])
    {
        include "view/header.php";
        include "$view";
        include "view/footer.php";
    }

    protected function isValidWord($var){
        return preg_match('/^[a-zA-Z0-9- ]+$/', $var);
    }

    protected function isValidDate($var){
        $date_tokens  = explode('-', $var);

        if (count($date_tokens) == 3) {
            return checkdate($date_tokens[1], $date_tokens[2], $date_tokens[0]);
        }else{
            return false;
        }
    }

    protected function isValidNumber($var){
        return preg_match('/^[0-9]+$/', $var);
    }
}