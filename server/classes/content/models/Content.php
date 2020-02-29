<?php

namespace content\models;


use util\interfaces\Serializable;

class Content implements Serializable
{

    /** @var string */
    protected $slug = '';

    /** @var null|\DateTime */
    protected $creationDate;

    /** @var string */
    protected $title = '';

    /** @var null|Markdown */
    protected $markdown;

    public function getCreationDate(): ?\DateTime
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
        $this->slug = self::createSlug($title);

        $this->title = $title;
    }

    public function getMarkdown(): ?Markdown
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

    public function getSlug(): string
    {
        return $this->slug;
    }

    private static function createSlug(string $title): string
    {
        // replace non letter or digits by -
        $title = preg_replace('~[^\pL\d]+~u', '-', $title);

        // transliterate
        $title = iconv('utf-8', 'us-ascii//TRANSLIT', $title);

        // remove unwanted characters
        $title = preg_replace('~[^-\w]+~', '', $title);

        // trim
        $title = trim($title, '-');

        // remove duplicate -
        $title = preg_replace('~-+~', '-', $title);

        // lowercase
        $title = strtolower($title);

        return $title;
    }

    /**
     * @param array $input
     * @return Content
     */
    public function deserialize(array $input): Serializable
    {
        $this->slug = $input['slug'];
        $this->title = $input['title'];
        $this->markdown = new Markdown((string)$input['markdown']);
        $this->creationDate = new \DateTime((string)$input['creation_date']);

        return $this;
    }

}
