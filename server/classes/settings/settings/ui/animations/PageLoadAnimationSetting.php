<?php

namespace settings\settings\ui\animations;

use settings\types\options\Option;

class PageLoadAnimationSetting extends AnimationSetting
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

    /** @return Option[] */
    public function options()
    {
        return [
            new Option('Yes', 'yes'),
            new Option('No', 'no'),
        ];
    }
}
