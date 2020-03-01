<?php

namespace application;

use application\state\AppState;
use database\Connection;
use render\controller\RenderController;
use render\controller\TwigController;
use request\Request;

class App
{
    /** @var App */
    private static $instance;

    /** @var Request */
    private $request;

    /** @var Environment */
    private $env;

    /** @var RenderController */
    private $renderController;

    /** @var AppState */
    private $state;

    /** @var Connection */
    private $db;

    private function __construct()
    {
        $this->db = Connection::getInstance();
        $this->state = new AppState($this->db);
        $this->request = new Request();
        $this->env = Environment::getInstance();
        $this->renderController = new TwigController();

        $this->request->save($this->db);
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new App();
        }
        return self::$instance;
    }

    public function getState(): AppState
    {
        return $this->state;
    }

    public function setState(AppState $state): void
    {
        $this->state = $state;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function getRenderController(): RenderController
    {
        return $this->renderController;
    }

    public function getDb(): Connection
    {
        return $this->db;
    }

    public function getError(): ?string
    {
        return (isset($_SESSION['error']) ? (string)$_SESSION['error'] : null);
    }

}
