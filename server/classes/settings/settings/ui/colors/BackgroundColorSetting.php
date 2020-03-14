<?php

namespace settings\settings\ui\colors;

class BackgroundColorSetting extends ColorSetting
{

    public static function dbKey(): string
    {
        return 'BG_COLOR';
    }

    public function getDefaultValue(): string
    {
        return '#ffffff';
    }

    public function cssProperty(): string
    {
        return '--body-bg-color';
    }

    public function description(): string
    {
        return 'Background color';
    }

}
