<?php
session_start();

ini_set('display_errors', '1');
spl_autoload_register(function ($class){
    require __DIR__ .  '/' . str_replace('\\', '/', $class) . '.php';
});

$template = new \core\Template();
$dbInfo = parse_ini_file('config/db.ini');
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['password']);
$db = new \database\PDODatabase($pdo);