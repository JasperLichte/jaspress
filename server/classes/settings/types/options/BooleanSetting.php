<?php
namespace settings\types\options;

abstract class BooleanSetting extends OptionsSetting
{

    /** @return Option[] */
    public function options()
    {
        return [
            new Option('Yes', 'yes'),
            new Option('No', 'no'),
        ];
    }

}
