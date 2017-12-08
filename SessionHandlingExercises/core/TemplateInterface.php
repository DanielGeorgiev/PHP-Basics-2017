<?php

namespace core;


interface TemplateInterface
{
    public function render(string $templateName, $data = []);
}