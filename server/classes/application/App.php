<?php

namespace application;

use application\state\AppState;
use render\components\AbstractPageComponent;
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

    private function __construct()
    {
        $this->state = new AppState();
        $this->request = new Request();
        $this->env = Environment::getInstance();
        $this->renderController = new TwigController();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new App();
        }
        return self::$instance;
    }

    public function run(AbstractPageComponent $page): string
    {
        $this->saveRequest();

        return $page
            ->setReq($this->request)
            ->setRenderController($this->renderController)
            ->render();
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

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function getRenderController(): RenderController
    {
        return $this->renderController;
    }
}
