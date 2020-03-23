<?php

namespace settings\settings\ui;

use settings\categories\SettingsCategory;
use settings\categories\UiSettingCategory;
use settings\validator\NumberValidator;
use settings\validator\Validator;

class ContentWidthSetting extends UiSetting
{

    public function getDefaultValue(): string
    {
        return '1280';
    }

    public function getCategory(): SettingsCategory
    {
        return new UiSettingCategory();
    }

    public static function dbKey(): string
    {
        return 'CONTENT_WIDTH';
    }

    public function description(): string
    {
        return 'Maximum width [px]';
    }

    public function getValidator(): Validator
    {
        return new NumberValidator(600, null);
    }

    public function cssProperty(): string
    {
        return '--content-width';
    }

    public function isNumberSetting(): bool
    {
        return true;
    }
}
