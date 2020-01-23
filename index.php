<?php

require_once('./server/autoload.php');

use application\Application;
use render\ContentFactory;
use request\Request;

$app = Application::getInstance();
$app->setRequest(new Request());

echo $app->run(ContentFactory::START);
