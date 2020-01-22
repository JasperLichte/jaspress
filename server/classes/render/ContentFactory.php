<?php

    namespace render;

    use render\components\content\components\StartContent;
    use request\Request;
    use render\components\content\ContentComponentInterface;
    use render\components\content\ContentComponent;

    class ContentFactory
    {
        public const START = 'START';

        public static function get(string $contentKey, Request $request): ContentComponentInterface
        {
            switch ($contentKey) {
                case self::START: return new StartContent($request);
            }
            return new ContentComponent($request);
        }

    }
