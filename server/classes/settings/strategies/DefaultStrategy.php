<?php

namespace settings\strategies;

use database\Connection;

class DefaultStrategy implements SavingStrategy
{

    /** @var string */
    private $dbKey = '';

    /** @var string */
    private $value = '';

    public function save(Connection $db)
    {
        $statement = $db()->prepare('REPLACE INTO settings (id, value) VALUES(?, ?)');
        $statement->execute([$this->dbKey, $this->value]);
    }

    public function delete(Connection $db)
    {
        $db()->prepare('DELETE FROM settings WHERE id = ?')->execute([$this->dbKey]);
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function setDbKey(string $dbKey): void
    {
        $this->dbKey = $dbKey;
    }

}
