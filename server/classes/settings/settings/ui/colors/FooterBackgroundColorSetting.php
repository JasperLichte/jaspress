<?php

namespace settings\settings\ui\colors;

use settings\Settings;

class FooterBackgroundColorSetting extends ColorSetting
{

    public static function dbKey(): string
    {
        return 'FOOTER_BG_COLOR';
    }

    public function cssProperty(): string
    {
        return '--footer-bg-color';
    }

    public function description(): string
    {
        return 'Footer background color';
    }

    public function getDefaultValue(): string
    {
        return Settings::getInstance($this->db)->get(HeaderBackgroundColorSetting::dbKey());
    }
}
