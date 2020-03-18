<?php

namespace api\actions\admin\page;

use api\actions\admin\AdminAction;
use content\models\Markdown;
use content\models\Page;
use render\components\pages\PagePage;

abstract class PageAction extends AdminAction
{

    /** @var Page|null */
    protected $page = null;

    /** @var string */
    protected $slug = '';

    /** @var string */
    protected $title = '';

    /** @var string */
    protected $content = '';

    public function __construct()
    {
        parent::__construct();

        if ($this->req->issetGet(PagePage::GET_PAGE_KEY)) {
            $this->slug = $this->req->getGet(PagePage::GET_PAGE_KEY);
        } elseif ($this->req->issetPost(PagePage::GET_PAGE_KEY)) {
            $this->slug = $this->req->getPost(PagePage::GET_PAGE_KEY);
        }

        if ($this->req->issetPost('title')) {
            $this->title = $this->req->getPost('title');
        }
        if ($this->req->issetPost('content')) {
            $this->content = $this->req->getPost('content');
        }

        if (!empty($this->title) && !empty($this->title)) {
            $this->page = new Page();
            $this->page->setSlug((string)$this->slug);
            $this->page->setTitle($this->title);
            $this->page->setMarkdown(new Markdown($this->content));
        }
    }

}
