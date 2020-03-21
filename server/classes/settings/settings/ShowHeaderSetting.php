<?php

namespace settings\settings;

use settings\categories\SettingsCategory;
use settings\categories\UiSettingCategory;
use settings\types\options\Option;
use settings\types\options\OptionsSetting;
use settings\validator\BooleanValidator;
use settings\validator\Validator;

class ShowHeaderSetting extends OptionsSetting
{

    public function getDefaultValue(): string
    {
        return 'yes';
    }

    public function getCategory(): SettingsCategory
    {
        return new UiSettingCategory();
    }

    public static function dbKey(): string
    {
        return 'SHOW_HEADER';
    }

    public function description(): string
    {
        return 'Header visible';
    }

    /** @return Option[] */
    public function options()
    {
        return [
            new Option('Yes', 'yes'),
            new Option('No', 'no'),
        ];
    }

    public function getValidator(): Validator
    {
        return new BooleanValidator();
    }

}
