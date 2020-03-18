<?php

namespace render\components\pages\admin\page;

use render\components\pages\admin\AdminPage;
use render\components\pages\PagePage;

abstract class PageAdminPage extends AdminPage
{

    /** @var bool */
    protected $slug;

    public function __construct()
    {
        parent::__construct();

        if ($this->req->issetGet(PagePage::GET_PAGE_KEY)) {
            $this->slug = $this->req->getGet(PagePage::GET_PAGE_KEY);
        }
    }

}
