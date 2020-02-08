<?php

namespace api\actions\auth;

use api\actions\Action;
use api\ApiResponse;
use auth\exceptions\UnknownUserException;
use auth\exceptions\WrongPasswordException;
use auth\Login;
use auth\models\User;

class RegisterAction extends Action
{

    public function run(): ApiResponse
    {
        $user = (new User())->deserialize($this->req->getAllPost());
        if ($user->isEmpty()) {
            return $this->res->setErrorMessage('Empty user passed')->asJson();
        }

        if (User::loadByEmail($user->getEmail()) != null) {
            return $this->res->setErrorMessage('User exists')->asJson();
        }

        try {
            User::storeNew($user);
            $login = new Login($user);
            $login->perform();
        } catch(UnknownUserException $e) {
            return $this->res->exception($e)->asJson();
        } catch (WrongPasswordException $e) {
            return $this->res->exception($e)->asJson();
        }

        return $this->res->setSuccessMessage('Successfully registered');
    }

}
