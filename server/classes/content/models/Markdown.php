<?php

namespace content\models;


class Markdown
{

    /**
     * @var string 
     */
    private $content = '';

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

}
