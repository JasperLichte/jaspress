<?php


    namespace render\components;

    use render\ContentFactory;

    class Main implements Component
    {
        /**
         * @var ContentFactory
         */
        private $content;

        public function __construct(ContentFactory $content)
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