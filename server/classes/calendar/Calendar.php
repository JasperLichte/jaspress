<?php

namespace calendar;

use database\Connection;

class Calendar
{

    /** @var Connection */
    private $db;

    /** @var Item[] */
    private $items = [];

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function load()
    {
        $stmt = $this->db->getPdo()->prepare('');
        $stmt->execute();

        $items = [];
        foreach ($stmt->fetchAll() as $item) {
            $items[] = (new Item())->deserialize($item);
        }
        $this->items = $items;
    }

    /** @return Item[] */
    public function getItems(): array
    {
        return $this->items;
    }

}
