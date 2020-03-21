<?php

namespace settings\settings\ui\animations;

use settings\categories\SettingsCategory;
use settings\categories\UiSettingCategory;
use settings\types\options\BooleanSetting;
use settings\validator\BooleanValidator;
use settings\validator\Validator;

class PageLoadAnimationSetting extends BooleanSetting
{

    public function getDefaultValue(): string
    {
        return 'yes';
    }

    public static function dbKey(): string
    {
        return 'PAGE_LOAD_ANIMATION';
    }

    public function description(): string
    {
        return 'Animation on page load?';
    }

    public function getValidator(): Validator
    {
        return new BooleanValidator();
    }

    public function getCategory(): SettingsCategory
    {
        return new UiSettingCategory();
    }

}
