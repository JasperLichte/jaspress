<?php

require_once('./server/autoload.php');

use application\Application;
use render\ContentFactory;
use request\Request;

echo Application::getInstance(new Request($_GET, $_POST))->run(ContentFactory::START);
