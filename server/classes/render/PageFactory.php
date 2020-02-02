<?php

    namespace render;

    use render\components\pages\components\PageComponent;
    use render\components\pages\components\StartComponent;
    use request\Request;
    use render\components\pages\PageComponentInterface;

    class PageFactory
    {

        public static function get(string $pageKey, Request $request): PageComponentInterface
        {
            $renderController = new TwigController();
            switch ($pageKey) {
                case PageTypes::START:
                    if (StartComponent::shouldRenderPageContent($request)) {
                        return new PageComponent($request, $renderController);
                    }
                    return new StartComponent($request, $renderController);
            }
            return new PageComponent($request, $renderController);
        }

    }
