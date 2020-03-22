<?php

namespace settings\settings\ui;

use settings\categories\SettingsCategory;
use settings\categories\UiSettingCategory;
use settings\types\options\Option;
use settings\types\options\OptionsSetting;

class UiScaleSetting extends OptionsSetting
{

    public function getDefaultValue(): string
    {
        return '1';
    }

    public function getCategory(): SettingsCategory
    {
        return new UiSettingCategory();
    }

    public static function dbKey(): string
    {
        return 'UI_SCALE';
    }

    public function description(): string
    {
        return 'User interface scaling';
    }

    /** @return Option[] */
    public function options()
    {
        return [
            new Option('50%', '0.5'),
            new Option('60%', '0.6'),
            new Option('70%', '0.7'),
            new Option('80%', '0.8'),
            new Option('90%', '0.9'),
            new Option('100%', '1'),
            new Option('110%', '1.1'),
            new Option('120%', '1.2'),
            new Option('150%', '1.5'),
            new Option('200%', '2'),
        ];
    }
}
