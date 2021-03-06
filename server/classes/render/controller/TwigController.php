<?php

namespace render\controller;

require_once __DIR__ . '/../../../vendor/autoload.php';

use application\App;
use config\ClientCustomizer;
use request\Url;
use settings\Settings;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigController implements RenderController
{

    /** @var Environment */
    private $twig;

    public function __construct()
    {
        $basePath = realpath(__DIR__ . '/../../../../');

        $loader = new FilesystemLoader('/', $basePath . '/');
        $loader->addPath($basePath . '/server/templates', '__main__');
        $loader->addPath($basePath . '/server/templates/pages', 'pages');
        $loader->addPath($basePath . '/server/templates/components', 'components');
        $loader->addPath($basePath . '/server/templates/components/common', 'common');
        $loader->addPath($basePath . '/server/templates/components/errors/', 'errors');
        $loader->addPath($basePath . '/server/templates/api/', 'api');
        $loader->addPath($basePath . '/server/templates/custom/', 'custom');

        $this->twig = new Environment($loader);
    }

    public function render(string $template, array $arguments = [], bool $withoutDefaultArgs = false): string
    {
        try {
            $app = App::getInstance();
            $state = $app->getState();
            if (!$withoutDefaultArgs) {
                $arguments = array_merge($arguments, [
                    'state'       => $state,
                    'user'        => $state->getUser(),
                    'settings'    => Settings::getInstance($app->getClientDb()),
                    'error'       => $app->getError(),
                    'url'         => new Url(),
                    'customizer'  => new ClientCustomizer(\application\Environment::getInstance(), $this),
                ]);
            }
            return $this->twig->render($template . '.twig', $arguments);
        } catch (\Exception $e) {}
        if (strpos($template, '@custom/') !== false) {
            return '';
        }
        return $this->render('@pages/404');
    }

}
