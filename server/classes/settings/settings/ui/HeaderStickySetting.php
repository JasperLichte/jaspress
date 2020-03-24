<?php

namespace settings\settings\ui;

use settings\categories\HeaderSettingCategory;
use settings\categories\SettingsCategory;
use settings\types\options\BooleanSetting;

class HeaderStickySetting extends BooleanSetting
{

    public function getDefaultValue(): string
    {
        return 'yes';
    }

    public function getCategory(): SettingsCategory
    {
        return new HeaderSettingCategory();
    }

    public static function dbKey(): string
    {
        return 'HEADER_STICKY';
    }

    public function description(): string
    {
        return 'Header sticky';
    }

}
