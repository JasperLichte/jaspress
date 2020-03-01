<?php

namespace auth\exceptions;


use auth\models\User;
use Exception;

class UnknownUserException extends Exception
{

    /** @var User */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        parent::__construct('Unknown user ' . $this->user->getEmail());
    }

}
