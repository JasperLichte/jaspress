<?php

namespace render\components\pages\admin;

use request\Url;
use settings\categories\ColorSettingCategory;
use settings\categories\GeneralSettingCategory;
use settings\categories\UiSettingCategory;

class SettingsPage extends AdminPage
{

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render(
            '@pages/admin/settings',
            [
                'categories' => [
                    new GeneralSettingCategory(),
                    new ColorSettingCategory(),
                    new UiSettingCategory(),
                ],
            ]
        );
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
