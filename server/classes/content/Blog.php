<?php

namespace content;


use content\models\Page;
use database\Connection;

class Blog
{

    /** @var Page[] */
    private $posts = [];

    /** @var Connection */
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
        $this->loadPosts();
    }

    private function loadPosts()
    {
        $this->posts = [];
        foreach ($this->db->getPdo()->query('SELECT * FROM pages WHERE deleted = "0"') as $item) {
            $this->posts[] = (new Page())->deserialize($item);
        }
    }

    /**
     * @return Page[]
     */
    public function getPosts(): array
    {
        return $this->posts;
    }

}
