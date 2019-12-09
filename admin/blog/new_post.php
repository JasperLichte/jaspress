<?php

    use components\Application;
    use helper\Request;
    use render\Content;

    require_once('../../server/autoload.php');
    echo Application::getInstance(new Request($_GET, $_POST))->run(Content::ADMIN_NEW_POST);
