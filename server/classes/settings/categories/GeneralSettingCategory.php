<?php

namespace settings\categories;


class GeneralSettingCategory extends SettingsCategory
{

    public function __construct()
    {
        parent::__construct('GENERAL');
    }

    public function title(): string
    {
        return 'General';
    }

}
