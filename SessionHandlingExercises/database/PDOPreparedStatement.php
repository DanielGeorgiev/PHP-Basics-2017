<?php

namespace database;


class PDOPreparedStatement implements PreparedStatementInterface
{
    /**
     * @var \PDOStatement
     */
    private $db_stm;

    public function __construct(\PDOStatement $db_stm)
    {
        $this->db_stm = $db_stm;
    }


    public function execute(array $params = []): ResultSetInterface
    {
        $this->db_stm->execute($params);

        return new PDOResultSet($this->db_stm);
    }
}