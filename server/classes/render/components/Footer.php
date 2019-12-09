<?php


    namespace render\components;


    use config\Config;

    class Footer implements Component
    {
        public function render(): string
        {
            $appName = Config::APP_NAME;

            return <<<HTML
<footer>
    <h3>© $appName 2019</h3>
</footer>
HTML;
        }
    }