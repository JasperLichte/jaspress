<?php

namespace api\actions\admin\page;

use api\ApiResponse;
use util\exceptions\EmptyMemberException;
use util\exceptions\LogicException;

class NewPageAction extends PageAction
{

    public function run(): ApiResponse
    {
        if ($this->page === null || $this->page->isEmpty()) {
            return $this->req->reloadWith(
                $this->res->setErrorMessage('Page cannot be empty!')
            );
        }

        try {
            $this->page->save($this->db);
        } catch (EmptyMemberException | LogicException $e) {
            return $this->req->reloadWith(
                $this->res->exception($e)
            );
        }

        return $this->req->redirectWith(
            $this->res->setSuccessMessage('Page saved'),
            $this->page->endpoint()
        );
    }

}
