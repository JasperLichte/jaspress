<?php

require_once('./server/autoload.php');

use application\App;
use render\components\pages\StartPage;

echo App::getInstance()->run(new StartPage());
