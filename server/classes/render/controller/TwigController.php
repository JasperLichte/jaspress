<?php

namespace render\controller;

require_once __DIR__ . './../../../vendor/autoload.php';

use application\Application;
use settings\Settings;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigController implements RenderController
{

    /**
     * @var Environment
     */
    private $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader();
        $loader->addPath(realpath(__DIR__ . './../../../../templates/pages/'), 'pages');

        $this->twig = new Environment($loader);
    }

    public function render(string $template, array $arguments): string
    {
        try {
            $this->twig->render(
                $template . '.twig',
                array_merge($arguments, [
                    'state' => Application::getInstance()->getState(),
                    'settings' => Settings::getInstance(),
                ])
            );
        } catch (\Exception $e) {}
        return '';
    }

}
