<?php

namespace settings\settings\ui\colors;

class HeaderBackgroundColorSetting extends ColorSetting
{

    public static function dbKey(): string
    {
        return 'HEADER_BG_COLOR';
    }

    public function cssProperty(): string
    {
        return '--header-bg-color';
    }

    public function description(): string
    {
        return 'Header background color';
    }

    public function getDefaultValue(): string
    {
        return '#8dcbd6';
    }
}
