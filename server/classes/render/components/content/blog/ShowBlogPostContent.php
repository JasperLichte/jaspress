<?php

    namespace render\components\content\blog;

    use blog\Post;
    use database\Connection;
    use database\QueryHelper;
    use helper\Request;
    use render\components\content\ContentComponent;
    use render\components\content\ContentComponentInterface;

    class ShowBlogPostContent extends ContentComponent implements ContentComponentInterface
    {
        /**
         * @var Post
         */
        private $post;

        public function __construct(Request $request)
        {
            parent::__construct($request);
            $this->loadPost();
        }

        public function headerIsExpanded(): bool
        {
            return false;
        }

        private function loadPost()
        {
            $id = ($this->request->issetGet('id') ? $this->request->getGet('id') : 0);

            if (empty($id)) {
                return;
            }
            $db = Connection::getInstance();
            $post = QueryHelper::getTableFields(
                $db,
                'blog_post',
                ['id', 'title', 'message', 'creation_date'],
                'id = ' . (int)$id,
                'creation_date DESC'
            );

            $post = reset($post);

            if (!count($post)) {
                return;

            }

            $this->post = new Post();
            $this->post->setId($post['id']);
            $this->post->setTitle($post['title']);
            $this->post->setMessage($post['message']);
            $this->post->setCreationDate($post['creation_date']);
        }

        public function render(): string
        {
            $title = htmlspecialchars($this->post->getTitle());
            $message = htmlspecialchars($this->post->getMessage());

            return <<<HTML
<h1>$title</h1>
<hr>
<p>$message</p>
HTML;
        }

    }