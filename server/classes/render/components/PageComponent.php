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

    /** @var RenderController */
    protected $renderController;


    public function __construct()
    {
        parent::__construct();
        $this->renderController = $this->app->getRenderController();
    }

    protected function render(): string
    {
        $this->calledParentInRender = true;

        $state = $this->app->getState();
        $this->app->setState($state->setUi($state->getUi()->setTitle($this->title())));

        return '';
    }

    /** @throws LogicException */
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

        $this->app->dispose();

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

}
