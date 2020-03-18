<?php

namespace render\components\pages\admin\page;

use render\components\pages\admin\AdminPage;
use render\components\pages\PagePage;
use request\Url;

class NewPagePage extends AdminPage
{

    /** @var bool */
    private $slug;

    public function __construct()
    {
        parent::__construct();

        if ($this->req->issetGet(PagePage::GET_PAGE_KEY)) {
            $this->slug = $this->req->getGet(PagePage::GET_PAGE_KEY);
        }
    }

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render(
            '@pages/admin/page/new',
            ['slug' => $this->slug]
        );
    }

    public static function endPoint(): Url
    {
        return Url::to('/admin/page/new.php');
    }

}
