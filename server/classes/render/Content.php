<?php

    namespace render;

    use helper\Request;
    use render\components\content\admin\blog\NewBlogPostContent;
    use render\components\content\blog\ShowBlogPostContent;
    use render\components\content\ContentComponentInterface;
    use render\components\content\ContentComponent;
    use render\components\content\StartContent;

    class Content
    {

        public const START = 'START';
        public const ADMIN_NEW_POST = 'ADMIN_NEW_POST';
        public const BLOG_SHOW_POST = 'BLOG_SHOW_POST';

        private $contentKey = '';

        /**
         * @var Request
         */
        private $request;

        public function __construct(string $contentKey, Request $request)
        {
            $this->contentKey = $contentKey;
            $this->request = $request;
        }

        public function getComponent(): ContentComponentInterface
        {
            switch ($this->contentKey) {
                case self::START:
                    return new StartContent($this->request);
                case self::ADMIN_NEW_POST:
                    return new NewBlogPostContent($this->request);
                case self::BLOG_SHOW_POST;
                    return new ShowBlogPostContent($this->request);
            }
            return new ContentComponent($this->request);
        }

    }
