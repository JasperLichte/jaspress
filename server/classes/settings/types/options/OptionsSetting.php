<?php

namespace settings\types\options;


use settings\BaseSetting;

abstract class OptionsSetting extends BaseSetting
{

    /**
     * @return Option[]
     */
    abstract public function options();

}
