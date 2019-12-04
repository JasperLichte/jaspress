<?php


    namespace render\components;


    class Footer implements Component
    {
        public function render():string
        {
            return <<<HTML
<footer>footer</footer>
HTML;

        }
    }