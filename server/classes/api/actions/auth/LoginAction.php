<?php

namespace api\actions\auth;


use api\actions\Action;
use api\ApiResponse;
use auth\exceptions\UnknownUserException;
use auth\exceptions\WrongPasswordException;
use auth\Login;
use auth\models\User;

class LoginAction extends Action
{

    public function run(): ApiResponse
    {
        $user = (new User())->deserialize($this->req->getAllPost());
        if ($user->isEmpty()) {
            return $this->res->setErrorMessage('Empty user passed')->status(401);
        }

        try {
            $login = new Login($user);
            $login->perform();
        } catch(UnknownUserException | WrongPasswordException $e) {
            return $this->res->exception($e)->status(401);
        }

        return $this->res->setSuccessMessage('Successfully logged in');
    }

}
