<?php

namespace settings\categories;


class ColorSettingCategory extends SettingsCategory
{

    public function __construct()
    {
        parent::__construct('COLOR');
    }

    public function title(): string
    {
        return 'Colors';
    }
}
