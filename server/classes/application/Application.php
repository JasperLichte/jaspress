<?php

namespace application;

use request\Request;
use render\ContentFactory;
use render\PageStructure;

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
        return (new PageStructure(ContentFactory::get($contentType, $this->request)))->build();
    }
}