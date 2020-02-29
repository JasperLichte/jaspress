<?php

namespace auth;


use auth\exceptions\UnknownUserException;
use auth\exceptions\WrongPasswordException;
use auth\models\User;
use database\Connection;
use util\exceptions\InvalidArgumentsException;

class Login
{

    /** @var User */
    private $user;

    /** @var Connection */
    private $db;

    public function __construct(Connection $db, User $user)
    {
        $this->user = $user;
        $this->db = $db;
    }

    /**
     * @throws UnknownUserException
     * @throws WrongPasswordException
     */
    public function perform()
    {
        $dbUser = User::loadByEmail($this->db, $this->user->getEmail());
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
        $_SESSION['user_id'] = $userId;
    }

    public static function endSession()
    {
        unset($_SESSION);
        session_destroy();
        session_write_close();
    }

}
