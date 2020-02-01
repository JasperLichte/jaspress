<?php

    namespace render;

    use render\components\pages\components\PageComponent;
    use render\components\pages\components\StartComponentBase;
    use request\Request;
    use render\components\pages\PageComponentInterface;

    class PageFactory
    {

        public static function get(string $pageKey, Request $request): PageComponentInterface
        {
            switch ($pageKey) {
                case PageTypes::START:
                    if (StartComponentBase::shouldRenderPageContent($request)) {
                        return new PageComponent($request);
                    }
                    return new StartComponentBase($request);
            }
            return new PageComponent($request);
        }

    }
