<?php

namespace app\http;

use core\TemplateInterface;

abstract class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;

    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;
    }

    public function render(string $templateName, $data = [])
    {
        return $this->template->render($templateName, $data);
    }

    public function redirect($url)
    {
        header("Location: $url");
    }
}