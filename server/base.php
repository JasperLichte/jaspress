<?php

require_once __DIR__ . '/headers.php';
require_once __DIR__ . '/autoload.php';
session_start();

ini_set('display_errors', 0);

function exceptionHandler($e) {
    echo $e->getMessage();
}

function errorHandler($e) {
    echo $e->getMessage();
}

//set_exception_handler('exceptionHandler');
//set_error_handler('errorHandler');
register_shutdown_function(function() {
    $err = error_get_last();
    if (is_null($err)) {
        return;
    }

    exceptionHandler(new Exception($err['message']));
});
