<?php

    namespace render\components\content;

    class StartContent extends ContentComponent implements ContentComponentInterface
    {
        public function render(): string
        {
            return 'huhu';
        }

        public function title(): string
        {
            return 'START';
        }
    }