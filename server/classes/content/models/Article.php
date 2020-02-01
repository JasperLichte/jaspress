<?php

namespace content\models;


class Article extends Content
{

    /**
     * @var int
     */
    private $id;

    public static function load(int $id): Article
    {
        $article = new Article();

        // TODO fetch page from db

        return $article;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

}
