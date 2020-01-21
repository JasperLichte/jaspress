<?php


    namespace blog;

    use database\Connection;
    use database\QueryHelper;

    class Blog
    {

        public function __construct()
        {
            $this->loadPosts();
        }

        public function loadPosts()
        {
            $db = Connection::getInstance();
            $posts = QueryHelper::getTableFields(
                $db,
                'blog_post',
                ['id', 'title', 'message', 'creation_date'],
                '',
                'creation_date DESC'
            );

            return $posts;
        }

        public function getLinks()
        {
            $db = Connection::getInstance();
            $links = QueryHelper::getTableFields(
                $db,
                'links',
                ['ID', 'Name'],
                null,
                'ID ASC'
            );



            return $links;
        }
    }
