<?php

namespace render\components\pages;

use content\models\Page;
use permissions\AlwaysAllowedPermission;
use permissions\Permission;
use render\components\PageComponent;
use request\Url;

class PagePage extends PageComponent
{

    public const GET_PAGE_KEY = 'p';

    /** @var Page */
    private $page;

    /** @var string */
    private $slug;

    public function __construct()
    {
        parent::__construct();

        if ($this->req->issetGet(self::GET_PAGE_KEY)) {
            $this->slug = $this->req->getGet(self::GET_PAGE_KEY);
            $this->page = Page::load($this->db, $this->slug);
        }
    }

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render(
            '@pages/page',
            [
                'slug' => (string)$this->slug,
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
        return Url::to('/page.php');
    }

    public function permission(): Permission
    {
        return new AlwaysAllowedPermission();
    }

}
