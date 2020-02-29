<?php

namespace api\actions\auth;


use api\actions\Action;
use api\ApiResponse;
use render\components\pages\auth\LoginPage;

class LogoutAction extends Action
{

    public function run(): ApiResponse
    {
        if ($this->req->getUser() !== null) {
            $this->req->getUser()->logout();
        }

        $this->req->redirectTo(LoginPage::endPoint());
        return $this->res->setSuccessMessage('Logged out');
    }

}
