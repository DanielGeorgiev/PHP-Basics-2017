<?php

class Notebook extends NotebookAbstract implements MouseInterface, KeyboardInterface, TouchPadInterface
{
    public function pressKey(string $key)
    {
        $this->writtenText .= $key;
        return $this->writtenText;
    }

    public function changeStatus()
    {
    }

    public function move($currX, $currY)
    {
    }

    public function click($leftClick, $rightClick)
    {
    }

    public function moveFinger()
    {
    }

    public function padClick()
    {
    }

    public function writeText(string $text)
    {
        $this->writtenText .= $text;
        return $this->writtenText;
    }
}