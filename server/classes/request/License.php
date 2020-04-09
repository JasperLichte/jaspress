<?php

namespace request;

use database\Connection;
use permissions\Permission;

class License
{

    /** @var string */
    private $token;

    /** @var Connection */
    private $rootDb;

    /** @var Connection|null */
    private $clientDb;

    /** @var bool */
    private $isValid = false;

    /** @var string */
    private $dbName = '';

    public function __construct(Connection $rootDb, string $token)
    {
        $this->rootDb = $rootDb;
        $this->token = $token;
        $this->setIsValid();
        $this->setDatabase();
    }

    private function setIsValid()
    {
        $stmt = $this->rootDb->getPdo()->prepare('SELECT * FROM licenses WHERE token = ? LIMIT 1');
        $stmt->execute([$this->token]);

        if ($stmt->rowCount() == 0) {
            $this->isValid = false;
            return;
        }

        $this->isValid = true;

        $result = $stmt->fetch();
        $this->dbName = $result['database'];
    }

    public function isValid(): bool
    {
        return $this->isValid;
    }

    public static function _isValid(?License $license): bool
    {
        if ($license == null) {
            return false;
        }

        return $license->isValid();
    }

    private function setDatabase()
    {
        $this->clientDb = Connection::getInstance($this->dbName);
    }

    public function getDb(): Connection
    {
        return $this->clientDb;
    }

}
