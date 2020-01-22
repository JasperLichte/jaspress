<?php

    require_once('./server/autoload.php');

    use application\Application;
    use request\Request;

    require_once('./server/autoload.php');
    echo Application::getInstance(new Request($_GET, $_POST))->run(''); // TODO pass valid enum
