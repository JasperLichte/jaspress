<?php

namespace render\components\pages\admin;

use render\components\PageComponent;
use request\Url;

class SettingsPage extends PageComponent
{

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render('@pages/admin/settings');
    }

    public function title(): string
    {
        return $this->buildTitle('Settings');
    }

    public static function endPoint(): Url
    {
        return Url::to('/admin/settings.php');
    }

}
