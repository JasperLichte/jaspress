<?php

namespace components;

use config\Config;
use render\Content;
use render\PageStructure;

class Application
{
    /**
     * @var Application
     */
    private static $instance = null;

    /**
     * @var Config
     */
    private $config = null;

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

    public function run(string $contentType):string
    {
        return (new PageStructure(new Content($contentType)))->build();
    }
}