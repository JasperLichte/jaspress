<?php

namespace auth\models;

use util\interfaces\Serializable;

class User implements Serializable
{

    /** @var int */
    private $id = 0;

    /** @var string */
    private $email = '';

    /** @var string */
    private $password = '';

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

    public static function load(string $email): User
    {
        return null;
        // TODO load existing user from db
    }

}
