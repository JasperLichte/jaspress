<?php

namespace content\models;


class Content
{

    /**
     * @var \DateTime
     */
    protected $creationDate;

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var Markdown
     */
    protected $markdown;

    public function getCreationDate(): \DateTime
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTime $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getMarkdown(): Markdown
    {
        return $this->markdown;
    }

    public function setMarkdown(Markdown $markdown): void
    {
        $this->markdown = $markdown;
    }

    public function isEmpty()
    {
        return (
            empty($this->title)
            || empty($this->markdown)
        );
    }

}
