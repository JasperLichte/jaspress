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

    public function load(): Calendar
    {
        $stmt = $this->db->getPdo()->prepare('
          SELECT *
          FROM calendar_entries
          WHERE due_date > NOW()
          ORDER BY due_date
        ');
        $stmt->execute();

        $items = [];
        foreach ($stmt->fetchAll() as $item) {
            $items[] = (new Item())->deserialize($item);
        }
        $this->items = $items;

        return $this;
    }

    /** @return Item[] */
    public function getItems(): array
    {
        return $this->items;
    }

}
