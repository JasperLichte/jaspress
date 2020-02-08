<?php

namespace render\components;

use application\App;
use render\controller\RenderController;
use request\Request;
use request\Url;
use settings\Settings;
use settings\settings\AppNameSetting;
use util\exceptions\LogicException;

class PageComponent extends AbstractPageComponent
{

    /** @var Request */
    protected $req;

    /** @var RenderController */
    protected $renderController;

    public function __construct()
    {
        $app = App::getInstance();

        $this->req = $app->getRequest();
        $this->renderController = $app->getRenderController();
    }

    protected function render(): string
    {
        $this->calledParentInRender = true;

        $app = App::getInstance();

        $state = $app->getState();
        $app->setState($state->setUi($state->getUi()->setTitle($this->title())));

        return '';
    }

    /**
     * @throws LogicException
     */
    public function __toString(): string
    {
        $out = $this->render();

        if (!$this->calledParentInRender) {
            throw new LogicException('PageComponents have to call super::parent() in their `render` method!');
        }

        return $out;
    }

    public static function endPoint(): Url
    {
        return new Url('/');
    }

    public function title(): string
    {
        return $this->buildTitle('');
    }

    protected function buildTitle(string $title = ''): string
    {
        $appName = Settings::getInstance()->byKey(AppNameSetting::DB_KEY)->getValue();
        return (empty($title) ? $appName : $title . ' | ' . $appName);
    }

}
