<?php

namespace application;

use request\Request;
use render\ContentFactory;

class Application
{
    /**
     * @var Application
     */
    private static $instance;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var AppState
     */
    private $state;

    private function __construct()
    {
        $this->state = new AppState();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Application();
        }
        return self::$instance;
    }

    public function run(string $contentType):string
    {
        return ContentFactory::get($contentType, $this->request)->render();
    }

    public function getState(): AppState
    {
        return $this->state;
    }

    public function setState(AppState $state): void
    {
        $this->state = $state;
    }

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }
}