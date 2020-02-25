<?php

namespace database;

use application\Environment;
use PDO;

class Connection
{

    // @var PDO
    private $pdo;

    // @var Connection
    private static $instance = null;

    private function __construct()
    {
        $env = Environment::getInstance();
        $this->pdo = new PDO(
            'mysql:host=' . $env->get('DB_HOST') . ';dbname=' . $env->get('DB_NAME'),
            $env->get('DB_USER'),
            $env->get('DB_PASSWORD')
        );
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Connection();
        }

        return self::$instance;
    }

    public function __invoke()
    {
        return $this->getPdo();
    }

}
