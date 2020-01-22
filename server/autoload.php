<?php

function my_autoloader($class)
{
    $filename = realpath(dirname(__FILE__)) . '/classes/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($filename)) {
        include($filename);
    }
}
spl_autoload_register('my_autoloader');
