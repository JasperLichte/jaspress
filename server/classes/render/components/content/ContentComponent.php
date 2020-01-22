<?php


    namespace render\components\content;


    use config\Config;
    use request\Request;

    class ContentComponent implements ContentComponentInterface
    {

        /**
         * @var Request
         */
        protected $request;

        public function __construct(Request $request)
        {
            $this->request = $request;
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
            return (empty($title) ? Config::APP_NAME : Config::APP_NAME . ' | ' . $title);
        }
    }
