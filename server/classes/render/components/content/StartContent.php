<?php

    namespace render\components\content;

    use blog\Blog;

    class StartContent extends ContentComponent implements ContentComponentInterface
    {
        public function render(): string
        {
            return (new Blog())->render();
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
