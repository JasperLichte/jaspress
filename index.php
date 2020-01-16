<?php

    require __DIR__ . '/vendor/autoload.php';

    use Twig\Environment;
    use Twig\Loader\FilesystemLoader;

    $loader = new FilesystemLoader(__DIR__ . '/server/templates');
    $twig = new Environment($loader);

    echo $twig->render('blog.twig', []);
