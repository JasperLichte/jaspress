<?php

namespace calendar;

use database\Connection;
use DateTime;
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

    /** @var DateTime */
    private $dueDate;

    public function isEmpty(): bool
    {
        return (empty($this->title || empty($this->dueDate)));
    }

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

    public function getDueDate(): DateTime
    {
        return $this->dueDate;
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
        if (isset($input['due_date'])) {
            $this->dueDate = new DateTime($input['due_date']);
        }

        return $this;
    }

    public function save(Connection $db)
    {
        $url = ($this->url == null ? '' : $this->url->getPath());

        $db()
            ->prepare('INSERT INTO calendar_entries (title, description, url, due_date) VALUES (?, ?, ?, ?)')
            ->execute([$this->title, $this->description, $url, $this->dueDate->format('Y-m-d H:i:s')]);
    }

    public static function delete(Connection $db, int $id)
    {
        $db()->prepare('DELETE FROM calendar_entries WHERE id = ?')->execute([$id]);
    }

}
