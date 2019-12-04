<?php


    namespace render\components;

    use render\Content;

    class Main implements Component
    {
        /**
         * @var Content
         */
        private $content;

        public function __construct(Content $content)
        {
            $this->content = $content;
        }

        public function render(): string
        {
            $contentComponent = $this->content->getComponent();
            if ($contentComponent === null) {
                return '';
            }
$contentString = $contentComponent->render();
            return <<<HTML
<main>$contentString</main>
HTML;
        }
    }