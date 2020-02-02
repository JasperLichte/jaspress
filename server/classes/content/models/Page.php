<?php

namespace content\models;


class Page extends Content
{

    /**
     * @var string
     */
    private $slug;

    public static function load(string $slug): ?Page
    {
        // TODO fetch page from db
        return null;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

}
