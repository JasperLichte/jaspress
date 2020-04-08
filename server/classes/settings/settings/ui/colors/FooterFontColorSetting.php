<?php

namespace settings\settings\ui\colors;

use settings\Settings;

class FooterFontColorSetting extends ColorSetting
{

    public static function dbKey(): string
    {
        return 'FOOTER_FONT_COLOR';
    }

    public function cssProperty(): string
    {
        return '--footer-font-color';
    }

    public function description(): string
    {
        return 'Footer font color';
    }

    public function getDefaultValue(): string
    {
        return Settings::getInstance($this->db)->get(HeaderFontColorSetting::dbKey());
    }
}
