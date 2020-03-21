<?php

namespace settings\settings\ui\images;

use settings\categories\SettingsCategory;
use settings\categories\UiSettingCategory;

class HeaderBannerImageUrlSetting extends ImageUrlSetting
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
        return 'HEADER_BANNER_URL';
    }

    public function description(): string
    {
        return 'Url to image that will be shown instead of header';
    }

}
