<?php

    use components\Application;
    use config\Config;
    use render\Content;

    require_once('./server/autoload.php');
    echo Application::getInstance(new Config())->run(Content::START);
