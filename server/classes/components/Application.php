<?php

namespace components;

use config\Config;
use render\Content;
use render\PageStructure;

class Application
{
    private static Application $instance;

    private Config $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public static function getInstance(Config $config)
    {
        if (self::$instance === null) {
            self::$instance = new Application($config);
        }
        return self::$instance;
    }

    public function run()
    {
        echo (new PageStructure(new Content($this->config)))->build();
    }
}