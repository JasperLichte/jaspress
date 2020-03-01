<?php

namespace settings\settings\ui;

use settings\BaseSetting;

abstract class UiSetting extends BaseSetting
{

    abstract public function cssProperty(): string;

}
