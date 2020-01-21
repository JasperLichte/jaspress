<?php


    namespace render\components;


    use config\Config;
    use helper\HtmlHelper;

    class Header implements Component
    {
        /**
         * @var bool
         */
        private $isExpanded;

        public function __construct(bool $isExpanded)
        {
            $this->isExpanded = $isExpanded;
        }

        public function render(): string
        {
            $linksHtml = '';
            foreach ($this->links() as $name => $link) {
                $linksHtml .= HtmlHelper::element(
                    'li',
                    [],
                    HtmlHelper::textLink(
                        $link,
                        [],
                        $name,
                        true
                    )
                );
            }

            $appName = Config::APP_NAME;
            $classes = [];
            if ($this->isExpanded) {
                $classes[] = 'expanded';
            }
            $classList = implode(' ', $classes);
            return <<<HTML
<header class="$classList">
    <div id="nav-container">
        <h1>$appName</h1>
        <nav>
            <ul>$linksHtml</ul>
        </nav>
    </div>
</header>
HTML;
        }

        private function links()
        {
            $url = Config::getRootUrl();

            return [
                ['name' => 'About', 'url' => $url . 'blog/about.php'],
                ['name' => 'Portfolio', 'url' => $url . 'blog/portfolio.php'],
                ['name' => 'Testimonials', 'url' => $url . 'blog/testimonials'],
                ['name' => 'Articles', 'url' => $url . 'blog/articles'],
            ];
        }
    }