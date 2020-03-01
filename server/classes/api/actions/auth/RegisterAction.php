<?php

namespace api\actions\auth;

use api\actions\Action;
use api\ApiResponse;
use auth\exceptions\UnknownUserException;
use auth\exceptions\WrongPasswordException;
use auth\Login;
use auth\models\User;
use render\components\pages\admin\DashboardPage;
use render\components\pages\auth\RegisterPage;
use render\components\pages\StartPage;
use util\exceptions\LogicException;

class RegisterAction extends AuthAction
{

    public function run(): ApiResponse
    {
        $user = (new User())->deserialize($this->req->getAllPost());
        if ($user->isEmpty()) {
            $this->req->reload('User cannot be empty');
        }

        if (User::loadByEmail($this->db, $user->getEmail()) != null) {
            $this->req->reload("User '" . $user->getEmail() . "' exists already");
        }

        try {
            User::storeNew($this->db, $user);
            $user = (new Login($this->db, $user))->perform();
        } catch(UnknownUserException | WrongPasswordException | LogicException $e) {
            $this->req->reload($e);
        }

        $this->req->redirectTo($user->isAdmin() ? DashboardPage::endPoint() : StartPage::endPoint());
        return $this->res->setSuccessMessage('Successfully registered');
    }

}
