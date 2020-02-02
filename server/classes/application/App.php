<?php

namespace application;

use application\state\AppState;
use request\Request;
use render\PageFactory;

class App
{
    /** @var App */
    private static $instance;

    /** @var Request */
    private $request;

    /** @var AppState */
    private $state;

    private function __construct()
    {
        $this->state = new AppState();
        $this->request = new Request();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new App();
        }
        return self::$instance;
    }

    public function run(string $pageType):string
    {
        $this->saveRequest();
        return PageFactory::get($pageType, $this->request)->build();
    }

    private function saveRequest()
    {
        // TODO save request in db
    }

    public function getState(): AppState
    {
        return $this->state;
    }

    public function setState(AppState $state): void
    {
        $this->state = $state;
    }
}
