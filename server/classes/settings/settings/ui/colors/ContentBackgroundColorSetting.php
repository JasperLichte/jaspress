<?php

namespace settings\settings\ui\colors;

class ContentBackgroundColorSetting extends ColorSetting
{

    public function getDefaultValue(): string
    {
        return '#ffffff';
    }

    public static function dbKey(): string
    {
        return 'CONTENT_BG_COLOR';
    }

    public function description(): string
    {
        return 'Content background color';
    }

    public function cssProperty(): string
    {
        return '--content-bg-color';
    }
}
