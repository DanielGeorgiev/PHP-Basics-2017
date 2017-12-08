<?php

namespace app\repository;


use database\DatabaseInterface;
use database\PDODatabase;

class HomeRepository implements HomeRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }
}