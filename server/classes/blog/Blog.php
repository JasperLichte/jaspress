<?php


    namespace blog;


    use database\Connection;
    use database\QueryHelper;
    use helper\HtmlHelper;

    class Blog
    {

        /**
         * @var Post[]
         */
        private $posts = [];

        public function __construct()
        {
            $this->loadPosts();
        }

        private function loadPosts()
        {
            $db = Connection::getInstance();
            $posts = QueryHelper::getTableFields(
                $db,
                'blog_post',
                ['id', 'title', 'message', 'creation_date'],
                '',
                'creation_date DESC'
            );

            foreach ($posts as $p) {
                $post = new Post();
                $post->setId($p['id']);
                $post->setTitle($p['title']);
                $post->setMessage($p['message']);
                $post->setCreationDate($p['creation_date']);

                $this->posts[] = $post;
            }
        }

        public function render(): string
        {
            return HtmlHelper::div(
                ['id' => 'blog-content'],
                implode(
                    '',
                    array_map(
                        function (Post $post) {
                            return $post->render();
                        },
                        $this->posts
                    )
                ),
                false
            );
        }
    }
