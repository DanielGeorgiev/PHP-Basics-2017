<?php

namespace database;


interface ResultSetInterface
{
    public function fetch($className): \Generator;
}