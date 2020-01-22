<?php

function my_autoloader($class)
{
    $filename = realpath(dirname(__FILE__)) . '/classes/' . str_replace('\\', '/', $class) . '.php';
    include($filename);
}
spl_autoload_register('my_autoloader');
