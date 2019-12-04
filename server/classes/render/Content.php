<?php

    namespace render;

    use render\components\content\ContentComponentInterface;
    use render\components\content\ContentComponent;
    use render\components\content\StartContent;

    class Content
    {

        public const START = 'start';

        private $contentKey = '';

        public function __construct(string $contentKey)
        {
            $this->contentKey = $contentKey;
        }

        public function getComponent(): ContentComponentInterface
        {
            switch ($this->contentKey) {
                case self::START:
                    return new StartContent();
            }
            return new ContentComponent();
    }

    }
