<?php


    namespace render\components\content;

    require_once __DIR__ . './../../../../vendor/autoload.php';

    use request\Request;
    use settings\Settings;
    use settings\settings\AppNameSetting;
    use Twig\Environment;
    use Twig\Loader\FilesystemLoader;

    class ContentComponent implements ContentComponentInterface
    {

        /**
         * @var Request
         */
        protected $request;

        /**
         * @var Environment
         */
        protected $twig;

        public function __construct(Request $request)
        {
            $this->request = $request;

            $loader = new FilesystemLoader();
            $loader->addPath(realpath(__DIR__ . './../../../../templates/pages/'), 'pages');

            $this->twig = new Environment($loader);
        }

        public function render(): string
        {
            return '';
        }

        public function title(): string
        {
            return '';
        }

        public function jsFiles(): array
        {
            return [];
        }

        public function cssFiles(): array
        {
            return [];
        }

        public function headerIsExpanded(): bool
        {
            return true;
        }

        protected function buildTitle(string $title = ''): string
        {
            $appName = Settings::getInstance()->getByKey(AppNameSetting::DB_KEY)->getValue();
            return (empty($title) ? $appName : $appName . ' | ' . $title);
        }
    }
