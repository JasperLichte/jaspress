<?php

namespace render\components\pages\guides;

use permissions\AlwaysAllowedPermission;
use permissions\Permission;
use render\components\PageComponent;
use request\Url;

class MarkdownGuidePage extends PageComponent
{

    public static function endPoint(): Url
    {
        return Url::to('/guides/markdown.php');
    }

    public function permission(): Permission
    {
        return new AlwaysAllowedPermission();
    }

    public function title(): string
    {
        return $this->buildTitle('Guide: Markdown');
    }

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render('@pages/guides/markdown');
    }

}
