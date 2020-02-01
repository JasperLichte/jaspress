<?php

require_once('./server/autoload.php');

use application\Application;
use render\PageTypes;

echo Application::getInstance()->run(PageTypes::START);
