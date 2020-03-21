<?php

namespace settings\settings\ui\images;

use settings\BaseSetting;
use settings\validator\UrlValidator;
use settings\validator\Validator;

abstract class ImageUrlSetting extends BaseSetting
{

    public function getValidator(): Validator
    {
        return new UrlValidator();
    }

}
