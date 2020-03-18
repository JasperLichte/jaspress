<?php

namespace render\components\pages\admin\page;

use content\models\Page;
use request\Url;

class EditPagePage extends PageAdminPage
{

    /** @var Page|null */
    private $page;

    public function __construct()
    {
        parent::__construct();

        if (!empty($this->slug)) {
            $this->page = Page::load($this->db, $this->slug);
        }
    }

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render(
            '@pages/admin/page/edit',
            ['page' => $this->page]
        );
    }

    public static function endPoint(): Url
    {
        return Url::to('/admin/page/edit.php');
    }

    public function title(): string
    {
        return $this->buildTitle(
            $this->page == null
                ? 'Edit page'
                : 'Edit: ' . $this->page->getTitle()
        );
    }

}
