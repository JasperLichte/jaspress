<?php

namespace application;

require_once __DIR__ . './../../vendor/autoload.php';

use josegonzalez\Dotenv\Loader;
use util\exceptions\InvalidArgumentsException;

class Environment
{
    /* @var Environment */
    private static $instance = null;

    private function __construct()
    {
        (new Loader(__DIR__ . './../../../.env'))->parse()->toEnv();
    }

    /** @throws InvalidArgumentsException */
    public function get(string $key): string
    {
        if (!isset($_ENV[$key])) {
            throw new InvalidArgumentsException('key ' . $key . ' does not exist in $_ENV');
        }
        return (isset($_ENV[$key]) ? $_ENV[$key] : '');
    }

    public static function getInstance()
    {
        if (self::$instance === null){
            self::$instance = new Environment();
        }
        return self::$instance;
    }
}
