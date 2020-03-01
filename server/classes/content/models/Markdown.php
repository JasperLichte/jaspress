<?php

namespace content\models;


use Parsedown;

class Markdown
{

    /** @var string */
    private $content = '';

    /** @var string */
    private $htmlContent = '';

    public function __construct(string $content)
    {
        $this->setContent($content);
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->htmlContent = self::getHtml($content);

        $this->content = $content;
    }

    private static function getHtml(string $md): string
    {
        return (new Parsedown())->text($md);
    }

    public function getHtmlContent(): string
    {
        return $this->htmlContent;
    }

}
