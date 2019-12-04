<?php


    namespace render\components;


    use helper\HtmlHelper;

    class Header implements Component
    {
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

            return <<<HTML
<header class="expanded">
    <div id="nav-container">
        <h1>HeavyHawk</h1>
        <nav>
            <ul>$linksHtml</ul>
        </nav>
    </div>
</header>
HTML;
        }

        private function links() {
            return [
                'Home' => 'hshshs',
                'About' => 'hshshs',
                'Referenzen' => 'hshshs',
                'Kontakt' => 'hshshs',
                'Impressum' => 'hshshs',
            ];
        }
    }