<?php

require_once __DIR__ . './autoload.php';

ini_set('display_errors', 0);

function exceptionHandler(Exception $e) {
    echo $e->getMessage();
}

function errorHandler(Error $e) {
    echo $e->getMessage();
}

set_exception_handler('exceptionHandler');
set_error_handler('errorHandler');
register_shutdown_function(function() {
    $err = error_get_last();
    if (is_null($err)) {
        return;
    }

    exceptionHandler(new Exception($err['message']));
});
