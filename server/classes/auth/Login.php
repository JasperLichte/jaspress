<?php

namespace auth;


use auth\exceptions\UnknownUserException;
use auth\exceptions\WrongPasswordException;
use auth\models\User;
use util\exceptions\InvalidArgumentsException;

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
        $dbUser = User::loadByEmail($this->user->getEmail());
        if ($dbUser == null || $dbUser->isEmpty()) {
            throw new UnknownUserException($this->user);
        }

        if (!password_verify($this->user->getPassword(), $dbUser->getPassword())) {
            throw new WrongPasswordException();
        }

        try {
            $this->startSession($dbUser->getId());
        } catch(InvalidArgumentsException $e) {
            throw new UnknownUserException($dbUser);
        }
    }

    /**
     * @param int $userId
     * @throws InvalidArgumentsException
     */
    private function startSession(int $userId)
    {
        if (empty($userId)) {
            throw new InvalidArgumentsException('userId cannot be empty');
        }

        session_start();
        $_SESSION['user_id'] = $userId;
    }

}
