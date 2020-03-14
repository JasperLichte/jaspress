<?php

namespace settings\settings\ui\colors;


use settings\categories\ColorSettingCategory;
use settings\categories\SettingsCategory;

class FontColorSetting extends ColorSetting
{

    public function getCategory(): SettingsCategory
    {
        return new ColorSettingCategory();
    }

    public static function dbKey(): string
    {
        return 'FONT_COLOR';
    }

    public function description(): string
    {
        return 'Font color';
    }

    public function cssProperty(): string
    {
        return '--font-color';
    }

    protected $defaultValue = '#222222';
}
