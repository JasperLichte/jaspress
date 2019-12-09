<?php

    namespace render;


    use config\Config;
    use helper\HtmlHelper;
    use render\components\Footer;
    use render\components\Header;
    use render\components\Main;

    class PageStructure
    {
        /**
         * @var Content
         */
        private $content;

        public function __construct(Content $content)
        {
            $this->content = $content;
        }

        private function cssFiles(): array
        {
            return [
                'document.css',
                'components/header.css',
                'components/footer.css',
                'components/main.css',
            ];
        }

        private function jsFiles(): array
        {
            return [];
        }

        private function metas(): string
        {
            return
                "<meta charset=\"UTF-8\">\n" .
                "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
        }

        /**
         * @param array $files
         * @return string
         */
        private function cssIncludes($files = [])
        {
            $html = '';
            foreach ($files as $file) {
                if (!is_string($file)) {
                    continue;
                }
                $file = Config::STYLES_ROOT_DIR() . $file;
                $html .= "<link rel=\"stylesheet\" href=\"{$file}\">\n";
            }
            return $html;
        }

        /**
         * @param array $files
         * @return string
         */
        private function jsIncludes($files = [])
        {
            $html = '';
            foreach ($files as $file => $fileType) {
                if (!is_string($file) || !is_string($fileType)) {
                    continue;
                }
                $file = Config::SCRIPTS_ROOT_DIR() . $file;
                $html .= HtmlHelper::jsImport($file, $fileType);
            }
            return $html;
        }

        public function build(): string
        {
            $contentComponent = $this->content->getComponent();
            return
                "<!DOCTYPE html>\n" .
                HtmlHelper::element(
                    'html',
                    ['lang' => 'de',],
                    (
                        HtmlHelper::element(
                            'head',
                            [],
                            $this->metas() .
                            HtmlHelper::title($contentComponent->title()) .
                            $this->cssIncludes(array_merge($this->cssFiles(), $contentComponent->cssFiles()))
                        ) .
                        HtmlHelper::element(
                            'body',
                            [],
                            implode(
                                '',
                                [
                                    (new Header($contentComponent->headerIsExpanded()))->render(),
                                    (new Main($this->content))->render(),
                                    (new Footer())->render(),
                                ]
                            ) .
                            $this->jsIncludes(array_merge($this->jsFiles(), $contentComponent->jsFiles()))
                        )
                    )
                );
        }
    }