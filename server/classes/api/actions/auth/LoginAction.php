<?php

namespace api\actions\auth;


use api\actions\Action;
use api\ApiResponse;
use auth\exceptions\UnknownUserException;
use auth\exceptions\WrongPasswordException;
use auth\Login;
use auth\models\User;
use render\components\pages\admin\DashboardPage;
use render\components\pages\auth\LoginPage;
use render\components\pages\StartPage;
use util\exceptions\LogicException;

class LoginAction extends AuthAction
{

    public function run(): ApiResponse
    {
        $user = (new User())->deserialize($this->req->getAllPost());
        if ($user->isEmpty()) {
            return $this->req->reloadWith(
                $this->res->setErrorMessage('User cannot be empty')->status(401)
            );
        }

        try {
            $login = new Login($this->db, $user);
            $user = $login->perform();
        } catch(UnknownUserException | WrongPasswordException | LogicException $e) {
            $this->res->exception($e)->status(401);
            return $this->req->reloadWith($this->res);
        }

        return $this->req->redirectWith(
            $this->res->setSuccessMessage('Successfully logged in'),
            $user->isAdmin() ? DashboardPage::endPoint() : StartPage::endPoint()
        );
    }

}
