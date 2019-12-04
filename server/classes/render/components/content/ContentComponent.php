<?php


    namespace render\components\content;


    class ContentComponent implements ContentComponentInterface
    {

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
    }