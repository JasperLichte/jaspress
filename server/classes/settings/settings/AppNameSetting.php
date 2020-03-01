<?php

namespace settings\settings;

use settings\BaseSetting;

class AppNameSetting extends BaseSetting
{

    protected $defaultValue = 'APP_NAME';

    public static function dbKey(): string
    {
        return 'APP_NAME';
    }

    public function description(): string
    {
        return 'Name of the application';
    }

}
