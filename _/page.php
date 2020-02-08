<?php

require_once('./../server/autoload.php');

use application\App;
use render\components\pages\PagePage;

echo App::getInstance()->run(new PagePage());
