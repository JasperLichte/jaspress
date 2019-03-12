<?php

function autoload($className)
{
  if (file_exists("./{$className}.php")) {
    require "./{$className}.php";
  }
}
spl_autoload_register("autoload");


$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');

?>
