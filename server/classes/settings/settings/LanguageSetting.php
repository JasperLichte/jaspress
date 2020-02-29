<?php

namespace settings\settings;

use settings\types\options\Option;
use settings\types\options\OptionsSetting;

class LanguageSetting extends OptionsSetting
{

    protected $defaultValue = 'en';

    public static function dbKey(): string
    {
        return 'APP_LANG';
    }

    public function options()
    {
        return [
            new Option('English', 'en'),
            new Option('Deutsch', 'de'),
        ];
    }

}
