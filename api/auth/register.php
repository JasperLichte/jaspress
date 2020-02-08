<?php

use api\actions\auth\RegisterAction;

require_once('./../../server/base.php');

echo (new RegisterAction())->run();
