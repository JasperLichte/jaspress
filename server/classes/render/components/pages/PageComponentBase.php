<?php

namespace render\components\pages;

use render\RenderController;
use request\Request;
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

    public function headerIsExpanded(): bool
    {
        return true;
    }

    protected function buildTitle(string $title = ''): string
    {
        $appName = Settings::getInstance()->getByKey(AppNameSetting::DB_KEY)->getValue();
        return (empty($title) ? $appName : $appName . ' | ' . $title);
    }
}
