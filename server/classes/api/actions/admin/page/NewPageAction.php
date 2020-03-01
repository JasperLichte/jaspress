<?php

namespace api\actions\admin\page;

use api\ApiResponse;
use util\exceptions\EmptyMemberException;
use util\exceptions\LogicException;

class NewPageAction extends PageAction
{

    public function run(): ApiResponse
    {
        try {
            $this->page->save($this->db);
        } catch (EmptyMemberException | LogicException $e) {
            return $this->res->setErrorMessage($e->getMessage());
        }

        $this->req->redirectTo($this->page->endpoint());
        return $this->res->setSuccessMessage('Page saved');
    }

}
