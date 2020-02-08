<?php

namespace render\components;

use application\App;
use render\controller\RenderController;
use render\controller\TwigController;
use request\Request;
use request\Url;
use settings\Settings;
use settings\settings\AppNameSetting;
use util\exceptions\LogicException;

class PageComponentBase
{

    /** @var Request */
    protected $req;

    /** @var RenderController */
    protected $renderController;

    /** @var bool */
    private $calledParent = false;

    public function __construct()
    {
        $app = App::getInstance();

        $this->req = $app->getRequest();
        $this->renderController = $app->getRenderController();
    }

    /**
     * NOTICE:
     * Inheriting classes should always call parent::render() on the first line in their render method!
     */
    protected function render(): string
    {
        $this->calledParent = true;

        $app = App::getInstance();

        $state = $app->getState();
        $app->setState($state->setUi($state->getUi()->setTitle($this->title())));

        return '';
    }

    public function __toString(): string
    {
        $out = $this->render();

        if (!$this->calledParent) {
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
