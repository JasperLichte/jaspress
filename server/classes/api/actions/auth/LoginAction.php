<?php

namespace api\actions\auth;


use api\actions\Action;
use api\ApiResponse;
use auth\exceptions\UnknownUserException;
use auth\exceptions\WrongPasswordException;
use auth\Login;
use auth\models\User;
use render\components\pages\StartPage;

class LoginAction extends Action
{

    public function run(): ApiResponse
    {
        $user = (new User())->deserialize($this->req->getAllPost());
        if ($user->isEmpty()) {
            return $this->res->setErrorMessage('Empty user passed')->status(401);
        }

        try {
            $login = new Login($this->db, $user);
            $login->perform();
        } catch(UnknownUserException | WrongPasswordException $e) {
            return $this->res->exception($e)->status(401);
        }

        $this->req->redirectTo(StartPage::endPoint());
        return $this->res->setSuccessMessage('Successfully logged in');
    }

}
