<?php

namespace render\components;

use application\Application;
use render\controller\RenderController;
use request\Request;
use request\Url;
use settings\Settings;
use settings\settings\AppNameSetting;

class PageComponentBase implements PageComponentInterface
{

    /** @var Request */
    protected $req;

    /** @var RenderController */
    protected $renderController;

    public function __construct(Request $request, RenderController $renderController)
    {
        $this->req = $request;
        $this->renderController = $renderController;
    }

    public function render(): string
    {
        $state = Application::getInstance()->getState();
        Application::getInstance()->setState($state->setUi($state->getUi()->setTitle('')));
        // TODO abstract
        return '';
    }

    public static function endPoint(): Url
    {
        return new Url('/');
    }

    public function title(): string
    {
        return '';
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
        $appName = Settings::getInstance()->getByKey(AppNameSetting::DB_KEY)->getValue();
        return (empty($title) ? $appName : $appName . ' | ' . $title);
    }
}
