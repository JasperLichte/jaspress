<?php

namespace settings\categories;

class UiSettingCategory extends SettingsCategory
{

    public function __construct()
    {
        parent::__construct('UI');
    }

    public function title(): string
    {
        return 'User interface';
    }
}
