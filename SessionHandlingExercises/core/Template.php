<?php

namespace core;


class Template implements TemplateInterface
{
    const TEMPLATES_FOLDER = 'app/templates/';
    const TEMPLATES_EXTENSION = '.php';

    public function render(string $templateName, $data = [])
    {
        require_once self::TEMPLATES_FOLDER . $templateName . self::TEMPLATES_EXTENSION;
    }
}