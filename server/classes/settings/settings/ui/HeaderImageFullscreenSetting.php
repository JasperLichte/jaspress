<?php

namespace settings\settings\ui;


use settings\categories\HeaderSettingCategory;
use settings\categories\SettingsCategory;
use settings\types\options\BooleanSetting;

class HeaderImageFullscreenSetting extends BooleanSetting
{

    public function getDefaultValue(): string
    {
        return 'no';
    }

    public function getCategory(): SettingsCategory
    {
        return new HeaderSettingCategory();
    }

    public static function dbKey(): string
    {
        return 'HEADER_IMG_FULLSCREEN';
    }

    public function description(): string
    {
        return 'Display banner as fullscreen?';
    }

}
