<?php

    namespace render;

    use request\Request;
    use render\components\content\ContentComponentInterface;
    use render\components\content\ContentComponent;

    class ContentFactory
    {

        public static function get(string $contentKey, Request $request): ContentComponentInterface
        {
            switch ($contentKey) {
            }
            return new ContentComponent($request);
        }

    }
