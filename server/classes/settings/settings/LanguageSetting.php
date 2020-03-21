<?php

namespace settings\settings;

use settings\categories\GeneralSettingCategory;
use settings\categories\SettingsCategory;
use settings\types\options\Option;
use settings\types\options\OptionsSetting;

class LanguageSetting extends OptionsSetting
{

    public function getDefaultValue(): string
    {
        return 'en';
    }

    public static function dbKey(): string
    {
        return 'APP_LANG';
    }

    public function options()
    {
        return [
            new Option('English', 'en'),
            new Option('Deutsch', 'de'),
        ];
    }

    public function description(): string
    {
        return 'Main language';
    }

    public function getCategory(): SettingsCategory
    {
        return new GeneralSettingCategory();
    }

}
