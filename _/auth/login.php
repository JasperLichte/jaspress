<?php

require_once('./../../server/autoload.php');

use application\App;
use render\components\pages\auth\LoginPage;

echo App::getInstance()->run(new LoginPage());
