<?php

require_once(__DIR__ . './../../server/base.php');

use api\actions\auth\LogoutAction;

echo (new LogoutAction())->run();
