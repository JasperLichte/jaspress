<?php

namespace render\components;

use application\App;
use render\controller\RenderController;
use render\controller\TwigController;
use request\Request;
use request\Url;
use settings\Settings;
use settings\settings\AppNameSetting;

class PageComponentBase
{

    /** @var Request */
    protected $req;

    /** @var RenderController */
    protected $renderController;

    public function build(): string
    {
        $app = App::getInstance();
        $state = $app->getState();
        $app->setState($state->setUi($state->getUi()->setTitle($this->title())));

        return $this->render();
    }

    public function render(): string
    {
        return '';
    }

    public static function endPoint(): Url
    {
        return new Url('/');
    }

    public function title(): string
    {
        return $this->buildTitle('');
    }

    public function jsFiles(): array
    {
        return [];
    }

    public function cssFiles(): array
    {
        return [];
    }

    protected function buildTitle(string $title = ''): string
    {
        $appName = Settings::getInstance()->byKey(AppNameSetting::DB_KEY)->getValue();
        return (empty($title) ? $appName : $title . ' | ' . $appName);
    }

    public function setReq(Request $req): PageComponentBase
    {
        $this->req = $req;

        return $this;
    }

    public function setRenderController(RenderController $renderController): PageComponentBase
    {
        $this->renderController = $renderController;
        return $this;
    }
}
