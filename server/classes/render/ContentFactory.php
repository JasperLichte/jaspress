<?php

    namespace render;

    use render\components\content\components\PageComponent;
    use render\components\content\components\StartComponent;
    use request\Request;
    use render\components\content\ContentComponentInterface;
    use render\components\content\ContentComponent;

    class ContentFactory
    {

        public static function get(string $contentKey, Request $request): ContentComponentInterface
        {
            switch ($contentKey) {
                case ContentTypes::START:
                    if (StartComponent::shouldRenderPageContent($request)) {
                        return new PageComponent($request);
                    }
                    return new StartComponent($request);
            }
            return new ContentComponent($request);
        }

    }
