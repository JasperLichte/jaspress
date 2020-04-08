<?php

namespace database;

use application\Environment;
use PDO;
use util\exceptions\InvalidArgumentsException;

class Connection
{

    private $pdo;

    // @var Connection
    private static $rootInstance = null;

    // @var Connection
    private static $clientInstance = null;

    /**
     * @param string $dbName
     * @throws InvalidArgumentsException
     */
    private function __construct(string $dbName)
    {
        $env = Environment::getInstance();

        if (empty($dbName)) {
            $dbName = $env->get('DB_NAME');
        }

        $this->pdo = new PDO(
            'mysql:host=' . $env->get('DB_HOST') . ';dbname=' . $dbName,
            $env->get('DB_USER'),
            $env->get('DB_PASSWORD')
        );
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    public static function getInstance(string $dbName = '')
    {
        if (empty($dbName)) {
            if (self::$rootInstance == null) {
                self::$rootInstance = new Connection('');
            }

            return self::$rootInstance;
        } else {
            if (self::$clientInstance == null) {
                self::$clientInstance = new Connection($dbName);
            }

            return self::$clientInstance;
        }
    }

    public function __invoke()
    {
        return $this->getPdo();
    }

}
