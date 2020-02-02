<?php

use api\actions\auth\LoginAction;

require_once('./../../server/autoload.php');

echo (new LoginAction())->run();
