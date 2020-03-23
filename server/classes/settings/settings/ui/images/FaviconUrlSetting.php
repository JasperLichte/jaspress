<?php

namespace settings\settings\ui\images;

use settings\categories\SettingsCategory;
use settings\categories\UiSettingCategory;

class FaviconUrlSetting extends ImageUrlSetting
{

    public function getDefaultValue(): string
    {
        return 'https://www.media.lichte.info/assets/favicon.ico';
    }

    public function getCategory(): SettingsCategory
    {
        return new UiSettingCategory();
    }

    public static function dbKey(): string
    {
        return 'FAVICON_URL';
    }

    public function description(): string
    {
        return 'Url to favicon file';
    }

}
