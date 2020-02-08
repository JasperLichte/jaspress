<?php

namespace auth\models;

use auth\Login;
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

    public static function loadByEmail(string $email): ?User
    {
        return null;
        // TODO load existing user from db
    }

    public static function loadFromSession(): ?User
    {
        if (!isset($_SESSION['user_id'])) {
            return null;
        }
        $userId = $_SESSION['user_id'];
        return null;
    }

    public static function storeNew(User $user): User
    {
        return $user;
        // TODO store $user in db, assign id
    }

}
