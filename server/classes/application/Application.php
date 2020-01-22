<?php

namespace application;

use request\Request;
use render\ContentFactory;

class Application
{
    /**
     * @var Application
     */
    private static $instance = null;

    /**
     * @var Request
     */
    private $request = null;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public static function getInstance(Request $request)
    {
        if (self::$instance === null) {
            self::$instance = new Application($request);
        }
        return self::$instance;
    }

    public function run(string $contentType):string
    {
        return ContentFactory::get($contentType, $this->request)->render();
    }
}