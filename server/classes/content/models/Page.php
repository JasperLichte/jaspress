<?php

namespace content\models;



use util\exceptions\EmptyMemberException;

class Page extends Content
{

    /**
     * @var string
     */
    private $slug = '';

    public static function load(string $slug): ?Page
    {
        // TODO fetch page from db
        return null;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @throws EmptyMemberException
     */
    public function save(): Page
    {
        if (empty($this->slug)) {
            throw new EmptyMemberException('Slug cannot be empty');
        }
        if (empty($this->title)) {
            throw new EmptyMemberException('Title cannot be empty');
        }
        if ($this->markdown === null) {
            throw new EmptyMemberException('Markdown cannot be null');
        }
        if (empty($this->markdown->getContent())) {
            throw new EmptyMemberException('Markdown content cannot be empty');
        }

        // Todo: save entity in db

        return $this;
    }

}
