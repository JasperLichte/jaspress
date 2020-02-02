<?php

namespace render\components;

use application\App;
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
        $title = (empty($title) ? $appName : $appName . ' | ' . $title);

        $app = App::getInstance();
        $state = $app->getState();
        $app->setState($state->setUi($state->getUi()->setTitle($title)));

        return $title;
    }
}
