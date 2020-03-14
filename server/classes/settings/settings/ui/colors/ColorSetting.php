<?php

namespace settings\settings\ui\colors;

use settings\categories\ColorSettingCategory;
use settings\categories\SettingsCategory;
use settings\settings\ui\UiSetting;

abstract class ColorSetting extends UiSetting
{

    /** @var SettingsCategory */
    private $category;

    public function __construct()
    {
        $this->category = new ColorSettingCategory();
    }

    public function getCategory(): SettingsCategory
    {
        return $this->category;
    }

}
