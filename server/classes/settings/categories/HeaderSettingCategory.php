<?php

namespace settings\categories;

class HeaderSettingCategory extends SettingsCategory
{

    public function __construct()
    {
        parent::__construct('HEADER');
    }

    public function title(): string
    {
        return 'Header';
    }

}
