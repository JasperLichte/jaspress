<?php

namespace api\actions\admin\page;

use api\ApiResponse;;

use render\components\pages\StartPage;
use util\exceptions\EmptyMemberException;
use util\exceptions\LogicException;

class EditPageAction extends PageAction
{

    public function run(): ApiResponse
    {
        if (empty($this->slug) || empty($this->content)) {
            return $this->req->reloadWith($this->res->setErrorMessage('Page cannot be empty!'));
        }

        try {
            $this->page->save($this->db, true);
        } catch(LogicException | EmptyMemberException $e) {
            return $this->req->reloadWith($this->res->exception($e));
        }

        return $this->req->redirectWith(
            $this->res->setSuccessMessage('Page edited'),
            ($this->slug == 'start'
                ? StartPage::endPoint()
                : $this->page->endpoint())
        );
    }

}
