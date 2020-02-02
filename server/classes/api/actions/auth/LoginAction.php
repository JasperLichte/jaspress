<?php

namespace api\actions\auth;


use api\actions\Action;
use auth\exceptions\UnknownUserException;
use auth\exceptions\WrongPasswordException;
use auth\Login;
use auth\models\User;

class LoginAction extends Action
{

    public function run(): string
    {
        $user = (new User())->deserialize($this->req->getAllPost());
        if ($user->isEmpty()) {
            return $this->res->setErrorMessage('Empty user passed')->asJson();
        }

        try {
            $login = new Login($user);
            $login->perform();
        } catch(UnknownUserException $e) {
            return $this->res->exception($e)->asJson();
        } catch (WrongPasswordException $e) {
            return $this->res->exception($e)->asJson();
        }

        return $this->res
            ->setSuccess(true)
            ->setMessage('Successfully logged in')
            ->withData(['user' => $user]);
    }

}
