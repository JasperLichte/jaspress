<?php

namespace render\components\pages;

use application\App;
use content\models\Page;
use render\components\PageComponent;
use request\Url;

class PagePage extends PageComponent
{

    public const GET_PAGE_KEY = 'p';

    /** @var Page */
    private $page;

    public function __construct()
    {
        parent::__construct();

        if ($this->req->issetGet(self::GET_PAGE_KEY)) {
            $this->page = Page::load($this->db, $this->req->getGet(self::GET_PAGE_KEY));
        }
    }

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render(
            '@pages/page',
            [
                'page' => $this->page,
            ]
        );
    }

    public function title(): string
    {
        $title = '404';
        if ($this->page != null && !$this->page->isEmpty()) {
            $title = $this->page->getTitle();
        }

        return $this->buildTitle($title);
    }

    public static function endPoint(): Url
    {
        return new Url('/_/page.php');
    }

}
