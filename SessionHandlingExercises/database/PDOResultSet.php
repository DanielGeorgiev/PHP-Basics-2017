<?php

namespace database;


class PDOResultSet implements ResultSetInterface
{
    /**
     * @var \PDOStatement
     */
    private $db_stm;

    public function __construct(\PDOStatement $db_stm)
    {
        $this->db_stm = $db_stm;
    }


    public function fetch($className): \Generator
    {
        while ($row = $this->db_stm->fetchObject($className))
        {
            yield $row;
        }
    }
}