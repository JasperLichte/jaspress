<?php

namespace settings\settings;

use settings\BaseSetting;
use settings\categories\GeneralSettingCategory;
use settings\categories\SettingsCategory;
use settings\validator\StringValidator;
use settings\validator\Validator;

class AppNameSetting extends BaseSetting
{

    public function getDefaultValue(): string
    {
        return 'My website';
    }

    public static function dbKey(): string
    {
        return 'APP_NAME';
    }

    public function description(): string
    {
        return 'Name of the application';
    }

    public function getCategory(): SettingsCategory
    {
        return new GeneralSettingCategory();
    }

    public function getValidator(): Validator
    {
        return new StringValidator();
    }

}
