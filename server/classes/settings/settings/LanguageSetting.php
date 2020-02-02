<?php

namespace settings\settings;

use settings\BaseSetting;

class LanguageSetting extends BaseSetting
{

    public const DB_KEY = 'APP_LANG';
    protected $defaultValue = 'en';

}
