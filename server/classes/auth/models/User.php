<?php

namespace auth\models;

use auth\Login;
use database\Connection;
use util\interfaces\Serializable;

class User implements Serializable
{

    /** @var int */
    private $id = 0;

    /** @var string */
    private $email = '';

    /** @var string */
    private $password = '';

    /** @var bool */
    private $isAdmin = false;

    /**
     * @param array $input
     * @return User
     */
    public function deserialize(array $input): Serializable
    {
        if (isset($input['id'])) {
            $this->id = (int)$input['id'];
        }
        if (isset($input['email'])) {
            $this->email = (string)$input['email'];
        }
        if (isset($input['password'])) {
            $this->password = (string)$input['password'];
        }
        if (isset($input['is_admin'])) {
            $this->isAdmin = (bool)$input['is_admin'];
        }

        return $this;
    }

    public function isEmpty(): bool
    {
        return (empty($this->email) || empty($this->password));
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    public function logout(): void
    {
        Login::endSession();
    }

    public static function loadByEmail(Connection $db, string $email): ?User
    {
        $stmt = $db()->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);

        $user = (new User())->deserialize((array)$stmt->fetch());

        return ($user->isEmpty() ? null : $user);
    }

    public static function loadById(Connection $db, int $id): ?User
    {
        $stmt = $db()->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([(int)$id]);

        $user = (new User())->deserialize((array)$stmt->fetch());

        return ($user->isEmpty() ? null : $user);
    }

    public static function loadFromSession(Connection $db): ?User
    {
        if (!isset($_SESSION['user_id'])) {
            return null;
        }
        $userId = (int)$_SESSION['user_id'];
        if (empty($userId)) {
            return null;
        }

        return User::loadById($db, $userId);
    }

    public static function storeNew(Connection $db, User $user)
    {
        $db()
            ->prepare('INSERT INTO users (email, password) VALUES (?, ?)')
            ->execute([$user->getEmail(), password_hash($user->getPassword(), PASSWORD_DEFAULT)]);
    }

}
