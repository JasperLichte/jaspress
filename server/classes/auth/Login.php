<?php

namespace auth;


use application\Environment;
use auth\exceptions\UnknownUserException;
use auth\exceptions\WrongPasswordException;
use auth\models\User;
use database\Connection;
use util\exceptions\InvalidArgumentsException;
use util\exceptions\LogicException;

class Login
{

    /** @var User */
    private $user;

    /** @var Connection */
    private $db;

    /**
     * @param Connection $db
     * @param User $user
     * @throws LogicException
     */
    public function __construct(Connection $db, User $user)
    {
        $this->user = $user;
        $this->db = $db;
        $this->init();
    }

    /**
     * @throws LogicException
     */
    private function init()
    {
        if (!$this->hasAdmin()) {
            $this->createRootUser();
        }
    }

    /**
     * @throws UnknownUserException
     * @throws WrongPasswordException
     */
    public function perform(): User
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

        return $dbUser;
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

    private function hasAdmin(): bool
    {
        $stmt = $this->db->getPdo()->prepare('SELECT id FROM users WHERE is_admin = "1"');
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    /**
     * @throws LogicException
     */
    private function createRootUser()
    {
        $env = Environment::getInstance();

        $user = new User();
        try {
            $user->setEmail($env->get('ROOT_USER'));
            $user->setPassword($env->get('ROOT_PASSWORD'));
            $user->setIsAdmin(true);
        } catch (InvalidArgumentsException $e) {
            throw new LogicException($e->getMessage());
        }

        $user->save($this->db);
    }

}
