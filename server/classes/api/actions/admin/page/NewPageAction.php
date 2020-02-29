<?php

namespace api\actions\admin\page;

use api\actions\Action;
use api\actions\admin\AdminAction;
use api\ApiResponse;
use content\models\Markdown;
use content\models\Page;
use util\exceptions\EmptyMemberException;
use util\exceptions\LogicException;

class NewPageAction extends AdminAction
{

    /** @var string */
    private $title = '';

    /** @var string */
    private $content = '';

    public function __construct()
    {
        parent::__construct();

        if ($this->req->issetPost('title')) {
            $this->title = $this->req->getPost('title');
        }
        if ($this->req->issetPost('content')) {
            $this->content = $this->req->getPost('content');
        }
    }

    public function run(): ApiResponse
    {
        $page = new Page();
        $page->setTitle($this->title);
        $page->setMarkdown(new Markdown($this->content));

        try {
            $page->save($this->db);
        } catch (EmptyMemberException | LogicException $e) {
            return $this->res->setErrorMessage($e->getMessage());
        }

        $this->req->redirectTo($page->endpoint());
        return $this->res->setSuccessMessage('Page saved');
    }

}
