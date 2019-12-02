<?php

use config\Config;

require_once('./server/autoload.php');
$app = components\Application::getInstance(new Config());
$app->run();
//$app->debug(app\components\Application::app()->db);