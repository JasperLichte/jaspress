<?php

namespace settings\settings\ui;

class HeaderBackgroundColorSetting extends UiSetting
{

    public static function dbKey(): string
    {
        return 'HEADER_BG_COLOR';
    }

    protected $defaultValue = '#222';

    public function cssProperty(): string
    {
        return '--header-bg-color';
    }

    public function description(): string
    {
        return 'Header background color';
    }

}
