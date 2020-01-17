<?php

require_once('./server/autoload.php');
require __DIR__ . 'server/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use blog\Blog;

    $loader = new FilesystemLoader(__DIR__ . '/server/templates');
    $twig = new Environment($loader);

    var_dump((new Blog)->render());

    echo $twig->render('blog.twig', []);

//use components\Application;
//use helper\Request;
//use render\Content;
//
//require_once('./server/autoload.php');
//echo Application::getInstance(new Request($_GET, $_POST))->run(Content::START);
