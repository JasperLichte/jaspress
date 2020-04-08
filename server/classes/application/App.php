<?php

namespace application;

use application\state\AppState;
use database\Connection;
use render\controller\RenderController;
use render\controller\TwigController;
use request\License;
use request\Request;

class App
{

    /** @var App */
    private static $instance;

    /** @var bool */
    private $succesfulInit = true;

    /** @var Request */
    private $request;

    /** @var Environment */
    private $env;

    /** @var RenderController */
    private $renderController;

    /** @var AppState */
    private $state;

    /** @var Connection */
    private $rootDb;

    /** @var Connection */
    private $clientDb;

    private function __construct()
    {
        $this->request = new Request();
        $this->rootDb = Connection::getInstance();
        $this->env = Environment::getInstance();
        $this->renderController = new TwigController();

        $license = $this->request->getLicense($this->rootDb);
        if (License::_isValid($license)) {
            $this->clientDb = $license->getDb();

            $this->state = new AppState($this->clientDb);
            $this->state->setLicense($license);

            $this->request->save($this->clientDb);
        } else {
            $this->succesfulInit = false;
        }
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

    public function getRootDb(): Connection
    {
        return $this->rootDb;
    }

    public function getClientDb(): Connection
    {
        return $this->clientDb;
    }

    public function getError(): ?string
    {
        return (isset($_SESSION['error']) ? (string)$_SESSION['error'] : null);
    }

    public function dispose()
    {
        unset($_SESSION['error']);
    }

    public function isSuccesfulInit(): bool
    {
        return $this->succesfulInit;
    }

}
