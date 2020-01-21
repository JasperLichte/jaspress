<?php

    require_once('./server/autoload.php');
    require __DIR__ . '/server/vendor/autoload.php';

    use Twig\Environment;
    use Twig\Loader\FilesystemLoader;
    use blog\Blog;
    use config\Config;

    $post = (new Blog())->loadPosts();

    $url = Config::getRootUrl();

    $link = [
        ['name' => 'About', 'url' => $url . 'blog/about.php'],
        ['name' => 'Portfolio', 'url' => $url .'blog/portfolio.php'],
        ['name' => 'Testimonials', 'url' => $url . 'blog/testimonials'],
        ['name' => 'Articles', 'url' => $url .'blog/articles'],
    ];

    $loader = new FilesystemLoader(__DIR__ . '/server/templates');
    $twig = new Environment($loader);

    echo $twig->render(
        '/pages/blog.twig',
        [
            'APP' => Config::APP_NAME,
            'links' => $link,
            'posts' => $post,
            'URL' => $url,
        ]
    );

    //use components\Application;
    //use helper\Request;
    //use render\Content;
    //
    //require_once('./server/autoload.php');
    //echo Application::getInstance(new Request($_GET, $_POST))->run(Content::START);
