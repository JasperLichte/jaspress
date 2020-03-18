<?php

namespace settings\settings\ui\animations;

use settings\categories\SettingsCategory;
use settings\categories\UiSettingCategory;
use settings\types\options\OptionsSetting;

abstract class AnimationSetting extends OptionsSetting
{

    public function getCategory(): SettingsCategory
    {
        return new UiSettingCategory();
    }

}
