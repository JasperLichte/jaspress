<?php

namespace settings\settings;

use settings\categories\HeaderSettingCategory;
use settings\categories\SettingsCategory;
use settings\types\options\Option;
use settings\types\options\OptionsSetting;

class HeaderImageBannerPosition extends OptionsSetting
{

    public function getDefaultValue(): string
    {
        return 'center';
    }

    public function getCategory(): SettingsCategory
    {
        return new HeaderSettingCategory();
    }

    public static function dbKey(): string
    {
        return 'HEADER_IMG_BANNER_POS';
    }

    public function description(): string
    {
        return 'Alignment of banner';
    }

    /** @return Option[] */
    public function options()
    {
        return [
            new Option('Left', 'left'),
            new Option('Center', 'center'),
            new Option('Right', 'right'),
        ];
    }
}
