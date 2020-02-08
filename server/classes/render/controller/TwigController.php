<?php

namespace render\controller;

require_once __DIR__ . './../../../vendor/autoload.php';

use application\App;
use request\Url;
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
        $loader = new FilesystemLoader('/', getcwd() . '/');
        $loader->addPath(getcwd() . '/server/templates', '__main__');
        $loader->addPath(getcwd() . '/server/templates/pages', 'pages');
        $loader->addPath(getcwd() . '/server/templates/components', 'components');
        $loader->addPath(getcwd() . '/server/templates/components/errors/', 'errors');
        $loader->addPath(getcwd() . '/server/templates/api/', 'api');

        $this->twig = new Environment($loader);
    }

    public function render(string $template, array $arguments = [], bool $withoutDefaultArgs = false): string
    {
        try {
            if (!$withoutDefaultArgs) {
                $arguments = array_merge($arguments, [
                    'state'      => App::getInstance()->getState(),
                    'settings'   => Settings::getInstance(),
                    'url'        => new Url(),
                ]);
            }
            return $this->twig->render($template . '.twig', $arguments);
        } catch (\Exception $e) {}
        return '';
    }

}
