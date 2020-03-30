<?php

namespace render\components\pages\admin\blog;

use content\Blog;
use render\components\pages\admin\AdminPage;
use request\Url;

class BlogPage extends AdminPage
{

    public static function endPoint(): Url
    {
        return Url::to('/admin/blog');
    }

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render(
            '@pages/admin/blog/blog',
            ['blog' => new Blog($this->db)]
        );
    }

}
