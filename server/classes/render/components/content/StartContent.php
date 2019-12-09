<?php

    namespace render\components\content;

    use blog\Blog;

    class StartContent extends ContentComponent implements ContentComponentInterface
    {
        public function render(): string
        {
            $blogContent = (new Blog())->render();
            return <<<HTML
$blogContent
HTML;
        }

        public function title(): string
        {
            return $this->buildTitle('START');
        }

        public function cssFiles(): array
        {
            return ['pages/start.css'];
        }
    }