<?php

namespace settings\settings\ui;

use settings\categories\HeaderSettingCategory;
use settings\categories\SettingsCategory;
use settings\Settings;
use settings\validator\NumberValidator;
use settings\validator\Validator;

class HeaderBannerImageWidth extends UiSetting
{

    public function getDefaultValue(): string
    {
        return '1920';
    }

    public function getCategory(): SettingsCategory
    {
        return new HeaderSettingCategory();
    }

    public static function dbKey(): string
    {
        return 'HEADER_BANNER_IMG_WIDTH';
    }

    public function description(): string
    {
        return 'Width of banner';
    }

    public function getValidator(): Validator
    {
        return new NumberValidator();
    }

    public function cssProperty(): string
    {
        return '--header-banner-image-width';
    }

    public function isNumberSetting(): bool
    {
        return true;
    }
}
