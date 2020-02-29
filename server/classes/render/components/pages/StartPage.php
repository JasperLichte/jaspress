<?php

namespace render\components\pages;

use content\Blog;
use render\components\PageComponent;
use request\Url;

class StartPage extends PageComponent
{

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render(
            '@pages/start',
            [
                'blog' => new Blog($this->db),
            ]
        );
    }

    public function title(): string
    {
        return $this->buildTitle('Start');
    }

    public static function endPoint(): Url
    {
        return Url::to('/');
    }

}
