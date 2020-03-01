<?php

namespace settings\settings\ui;

class BackgroundColorSetting extends UiSetting
{

    public static function dbKey(): string
    {
        return 'BG_COLOR';
    }

    protected $defaultValue = '#fff';

    public function cssProperty(): string
    {
        return '--body-bg-color';
    }

    public function description(): string
    {
        return 'Background color';
    }

}
