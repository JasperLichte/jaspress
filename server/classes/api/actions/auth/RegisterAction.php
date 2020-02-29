<?php

namespace api\actions\auth;

use api\actions\Action;
use api\ApiResponse;
use auth\exceptions\UnknownUserException;
use auth\exceptions\WrongPasswordException;
use auth\Login;
use auth\models\User;
use render\components\pages\StartPage;

class RegisterAction extends AuthAction
{

    public function run(): ApiResponse
    {
        $user = (new User())->deserialize($this->req->getAllPost());
        if ($user->isEmpty()) {
            return $this->res->setErrorMessage('Empty user passed')->asJson();
        }

        if (User::loadByEmail($this->db, $user->getEmail()) != null) {
            return $this->res->setErrorMessage('User exists')->asJson();
        }

        try {
            User::storeNew($this->db, $user);
            (new Login($this->db, $user))->perform();
        } catch(UnknownUserException | WrongPasswordException $e) {
            return $this->res->exception($e)->asJson();
        }

        $this->req->redirectTo(StartPage::endPoint());
        return $this->res->setSuccessMessage('Successfully registered');
    }

}
