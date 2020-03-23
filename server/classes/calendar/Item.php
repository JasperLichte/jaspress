<?php

namespace calendar;

use request\Url;
use util\interfaces\Serializable;

class Item implements Serializable
{

    /** @var int */
    private $id = 0;

    /** @var string */
    private $title = '';

    /** @var string */
    private $description = '';

    /** @var Url */
    private $url = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getUrl(): Url
    {
        return $this->url;
    }

    /**
     * @param array $input
     * @return Item
     */
    public function deserialize(array $input): Serializable
    {
        if (isset($input['id'])) {
            $this->id = (int)$input['id'];
        }
        if (isset($input['title'])) {
            $this->title = $input['title'];
        }
        if (isset($input['description'])) {
            $this->description = $input['description'];
        }
        if (isset($input['url'])) {
            $this->url = new Url($input['url']);
        }

        return $this;
    }
}
