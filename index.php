<?php

require_once('./server/autoload.php');

use application\App;
use render\PageTypes;

echo App::getInstance()->run(PageTypes::START);
