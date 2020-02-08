<?php

namespace application;

require_once __DIR__ . './../../vendor/autoload.php';

use josegonzalez\Dotenv\Loader;

class Environment
{

    public function __construct()
    {
        (new Loader(__DIR__ . './../../../.env'))->parse()->toEnv();
    }

    public function get(string $key): string
    {
        return (isset($_ENV[$key]) ? $_ENV[$key] : '');
    }

}
