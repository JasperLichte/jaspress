<?php

namespace settings\settings;

use settings\BaseSetting;
use settings\categories\GeneralSettingCategory;
use settings\categories\SettingsCategory;

class AppNameSetting extends BaseSetting
{

    public function getDefaultValue(): string
    {
        return 'My website';
    }

    public static function dbKey(): string
    {
        return 'APP_NAME';
    }

    public function description(): string
    {
        return 'Name of the application';
    }

    public function getCategory(): SettingsCategory
    {
        return new GeneralSettingCategory();
    }

}
