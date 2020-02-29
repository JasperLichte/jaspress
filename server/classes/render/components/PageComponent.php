<?php

namespace render\components;

use application\App;
use database\Connection;
use permissions\Permission;
use render\controller\RenderController;
use request\Request;
use request\Url;
use settings\Settings;
use settings\settings\AppNameSetting;
use util\exceptions\LogicException;

abstract class PageComponent extends AbstractPageComponent
{

    /** @var Request */
    protected $req;

    /** @var RenderController */
    protected $renderController;

     /** @var Connection */
    protected $db;

    /** @var App */
    private $app;

    public function __construct()
    {
        $this->app = App::getInstance();

        $this->req = $this->app->getRequest();
        $this->renderController = $this->app->getRenderController();

        $this->db = $this->app->getDb();
    }

    protected function render(): string
    {
        $this->calledParentInRender = true;

        $state = $this->app->getState();
        $this->app->setState($state->setUi($state->getUi()->setTitle($this->title())));

        return '';
    }

    /**
     * @throws LogicException
     */
    public function __toString(): string
    {
        if (!$this->checkPermission($this->permission())) {
            $this->req->redirectTo(Url::api('/auth/logout.php'));
            return '';
        }

        $out = $this->render();

        if (!$this->calledParentInRender) {
            throw new LogicException('PageComponents have to call parent::render() in their `render` method!');
        }

        return $out;
    }

    public function title(): string
    {
        return $this->buildTitle('');
    }

    protected function buildTitle(string $title = ''): string
    {
        $appName = Settings::getInstance()->get(AppNameSetting::dbKey())->getValue();
        return (empty($title) ? $appName : $title . ' | ' . $appName);
    }

    abstract public static function endPoint(): Url;

    abstract public function permission(): Permission;

    private function checkPermission(Permission $permission): bool
    {
        return $permission->check($this->req->getUser());
    }

}
