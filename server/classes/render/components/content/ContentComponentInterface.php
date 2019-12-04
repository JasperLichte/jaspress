<?php

    namespace render\components\content;

    interface ContentComponentInterface
    {
        public function render(): string;

        public function title(): string;

        public function jsFiles(): array;

        public function cssFiles(): array;

    }