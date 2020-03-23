<?php

namespace settings\settings\ui;

use settings\BaseSetting;
use settings\categories\SettingsCategory;
use settings\categories\UiSettingCategory;
use settings\validator\UrlValidator;
use settings\validator\Validator;

class ExtraCssUrlSetting extends BaseSetting
{

    public function getDefaultValue(): string
    {
        return '';
    }

    public function getCategory(): SettingsCategory
    {
        return new UiSettingCategory();
    }

    public static function dbKey(): string
    {
        return 'EXTRA_CSS_URL';
    }

    public function description(): string
    {
        return 'Url to custom css file';
    }

    public function getValidator(): Validator
    {
        return new UrlValidator();
    }
}
