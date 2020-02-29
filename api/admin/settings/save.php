<?php

use api\actions\admin\settings\SaveSettingsAction;

require_once(__DIR__ . './../../../server/base.php');

echo (new SaveSettingsAction())();
