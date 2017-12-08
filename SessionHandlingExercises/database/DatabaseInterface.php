<?php

namespace database;


interface DatabaseInterface
{
    public function prepare(string $query) : PreparedStatementInterface;

    public function lastInsertId();
}