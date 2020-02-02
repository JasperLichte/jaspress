<?php

use api\actions\auth\RegisterAction;

require_once('./../../server/autoload.php');

echo (new RegisterAction())->run();
