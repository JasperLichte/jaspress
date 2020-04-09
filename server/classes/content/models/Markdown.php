<?php

namespace content\models;


use Parsedown;
use util\interfaces\Jsonable;

class Markdown extends Jsonable
{

    /** @var string */
    private $content = '';

    /** @var string */
    private $htmlContent = '';

    /** @var string */
    private $description = '';

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
        $this->htmlContent = self::buildHtml($content);
        $this->description = self::buildDescription($this->htmlContent);

        $this->content = $content;
    }

    private static function buildHtml(string $md): string
    {
        return (new Parsedown())->text($md);
    }

    private static function buildDescription(string $htmlContent): string
    {
        $description = strip_tags($htmlContent);
        $description = substr($description, 0, 220);

        return $description;
    }

    public function getHtmlContent(): string
    {
        return $this->htmlContent;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

}
