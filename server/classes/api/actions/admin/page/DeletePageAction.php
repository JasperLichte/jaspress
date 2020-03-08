<?php

namespace api\actions\admin\page;

use api\ApiResponse;
use content\models\Page;
use render\components\pages\StartPage;

class DeletePageAction extends PageAction
{

    public function run(): ApiResponse
    {
        Page::delete($this->db, $this->slug);

        return $this->req->redirectWith(
            $this->res->setSuccessMessage('Page deleted'),
            StartPage::endPoint()
        );
    }

}
