<?php

interface MouseInterface
{
    public function move($currX, $currY);

    public function click($leftClick, $rightClick);
}