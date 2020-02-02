<?php

namespace auth;


use auth\exceptions\UnknownUserException;
use auth\exceptions\WrongPasswordException;
use auth\models\User;

class Login
{

    /** @var User */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @throws UnknownUserException
     * @throws WrongPasswordException
     */
    public function perform()
    {
        $dbUser = User::load($this->user->getEmail());
        if ($dbUser == null) {
            throw new UnknownUserException($this->user);
        }

        if (!password_verify($this->user->getPassword(), $dbUser->getPassword())) {
            throw new WrongPasswordException();
        }

        session_start();
        $_SESSION['user_id'] = $dbUser->getId();
    }

}
