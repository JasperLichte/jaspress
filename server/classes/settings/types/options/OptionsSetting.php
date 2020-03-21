<?php

namespace settings\types\options;


use settings\BaseSetting;
use settings\validator\OptionsValidator;
use settings\validator\Validator;

abstract class OptionsSetting extends BaseSetting
{

    /** @return Option[] */
    abstract public function options();

    public function getValidator(): Validator
    {
        return new OptionsValidator($this->options());
    }

}
