<?php

namespace request;

use database\Connection;

class Statistics
{

    /** @var Connection */
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function totalRequests(): int
    {
        $stmt = $this->db->getPdo()->prepare('SELECT COUNT(id) AS count FROM requests');
        $stmt->execute();

        return (int)$stmt->fetchColumn();
    }

    public function requestsByPath()
    {
        $stmt = $this->db->getPdo()->prepare('
          SELECT path, COUNT(id) AS count FROM requests GROUP BY path ORDER BY count DESC
      ');
        $stmt->execute();

        return $stmt->fetchAll();
    }

}
