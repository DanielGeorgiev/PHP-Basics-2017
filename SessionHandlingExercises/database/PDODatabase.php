<?php

namespace database;


class PDODatabase implements DatabaseInterface
{
    /**
     * @var \PDO
     */
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function prepare(string $query): PreparedStatementInterface
    {
        $stm = $this->db->prepare($query);
        return new PDOPreparedStatement($stm);
    }

    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }
}