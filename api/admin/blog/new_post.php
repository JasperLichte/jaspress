<?php

    use api\actions\admin\blog\NewPostAction;
    use helper\Request;

    require_once('../../../server/autoload.php');

    $newPostAction = new NewPostAction(new Request($_GET, $_POST));
    http_response_code($newPostAction->getStatusCode());
    echo $newPostAction->run();
