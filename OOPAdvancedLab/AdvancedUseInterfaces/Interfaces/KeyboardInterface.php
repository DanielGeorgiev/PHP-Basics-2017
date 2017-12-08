<?php

interface KeyboardInterface
{
    public function pressKey(string $key);

    public function changeStatus();
}