<?php

use api\actions\auth\LoginAction;

require_once('./../../server/base.php');

echo (new LoginAction())->run();
