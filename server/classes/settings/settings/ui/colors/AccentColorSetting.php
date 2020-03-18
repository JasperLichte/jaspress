<?php

namespace settings\settings\ui\colors;


class AccentColorSetting extends ColorSetting
{

    public function getDefaultValue(): string
    {
        return '#666666';
    }

    public static function dbKey(): string
    {
        return 'ACCENT_COLOR';
    }

    public function description(): string
    {
        return 'Accent color';
    }

    public function cssProperty(): string
    {
        return '--accent-color';
    }
}
